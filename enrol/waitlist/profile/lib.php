<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/// Some constants

define ('PROFILE_COURSE_FIELDS_VISIBLE_ALL',     '2'); // only visible for users with moodle/user:update capability
define ('PROFILE_COURSE_FIELDS_VISIBLE_PRIVATE', '1'); // either we are viewing our own profile or we have moodle/user:update capability
define ('PROFILE_COURSE_FIELDS_VISIBLE_NONE',    '0'); // only visible for moodle/user:update capability



/**
 * Base class for the customisable profile fields.
 */
class course_fields_profile_field_base {

    /// These 2 variables are really what we're interested in.
    /// Everything else can be extracted from them
    var $fieldid;
    var $courseid;

    var $field;
    var $inputname;
    var $data;
    var $dataformat;

    /**
     * Constructor method.
     * @param   integer   id of the profile from the user_info_field table
     * @param   integer   id of the user for whom we are displaying data
     */
    /*   function course_fields_profile_field_base($fieldid=0, $courseid=0) { */
    function __construct($fieldid=0, $courseid=0) {
        global $USER;

        $this->set_fieldid($fieldid);
        $this->set_courseid($courseid);
        $this->load_data();
    }


    /***** The following methods must be overwritten by child classes *****/

    /**
     * Abstract method: Adds the profile field to the moodle form class
     * @param  form  instance of the moodleform class
     */
    function edit_field_add($mform) {
        print_error('mustbeoveride', 'debug', '', 'edit_field_add');
    }


    /***** The following methods may be overwritten by child classes *****/

    /**
     * Display the data for this field
     */
    function display_data() {
        $options = new stdClass();
        $options->para = false;
        return format_text($this->data, FORMAT_MOODLE, $options);
    }

    /**
     * Print out the form field in the edit profile page
     * @param   object   instance of the moodleform class
     * $return  boolean
     */
    function edit_field($mform) {

        if ($this->field->visible != PROFILE_COURSE_FIELDS_VISIBLE_NONE) {

            $this->edit_field_add($mform);
            $this->edit_field_set_default($mform);
            $this->edit_field_set_required($mform);
            return true;
        }
        return false;
    }

    /**
     * Tweaks the edit form
     * @param   object   instance of the moodleform class
     * $return  boolean
     */
    function edit_after_data($mform) {

        if ($this->field->visible != PROFILE_COURSE_FIELDS_VISIBLE_NONE
          or has_capability('moodle/user:update', get_context_instance(CONTEXT_SYSTEM))) {
            $this->edit_field_set_locked($mform);
            return true;
        }
        return false;
    }

    /**
     * Saves the data coming from form
     * @param   mixed   data coming from the form
     * @return  mixed   returns data id if success of db insert/update, false on fail, 0 if not permitted
     */
    function edit_save_data($coursenew) {
        global $DB;

        if (!isset($coursenew->{$this->inputname})) {
            // field not present in form, probably locked and invisible - skip it
            return;
        }

        $data = new stdClass();

        // $coursenew->{$this->inputname} = $this->edit_save_data_preprocess($coursenew->{$this->inputname}, $data);
        $filedName = str_replace('profile_field_','',$this->inputname);
        $field = $DB->get_record('course_info_field',array('shortname' => $filedName));

        $data->course_id  = $coursenew->id;
        // $data->fieldid = $coursenew->field->id;
        $data->fieldid = $field->id;
        $data->data    = $coursenew->{$this->inputname};
        if ($dataid = $DB->get_field('course_info_data', 'id', array('course_id' => $data->course_id, 'fieldid' => $data->fieldid))) {
            $data->id = $dataid;
            $DB->update_record('course_info_data', $data);
        } else {
            $DB->insert_record('course_info_data', $data);
        }
    }

    /**
     * Validate the form field from profile page
     * @return  string  contains error message otherwise NULL
     **/
    function edit_validate_field($usernew) {
        global $DB;

        $errors = array();
        /// Check for uniqueness of data if required
        if ($this->is_unique()) {
            $value = (is_array($usernew->{$this->inputname}) and isset($usernew->{$this->inputname}['text'])) ? $usernew->{$this->inputname}['text'] : $usernew->{$this->inputname};
            $data = $DB->get_records_sql('
                    SELECT id, userid
                      FROM {user_info_data}
                     WHERE fieldid = ?
                       AND ' . $DB->sql_compare_text('data', 255) . ' = ' . $DB->sql_compare_text('?', 255),
                    array($this->field->id, $value));
            if ($data) {
                $existing = false;
                foreach ($data as $v) {
                    if ($v->userid == $usernew->id) {
                        $existing = true;
                        break;
                    }
                }
                if (!$existing) {
                    $errors[$this->inputname] = get_string('valuealreadyused');
                }
            }
        }
        return $errors;
    }

    /**
     * Sets the default data for the field in the form object
     * @param   object   instance of the moodleform class
     */
    function edit_field_set_default($mform) {
        if (!empty($default)) {
            $mform->setDefault($this->inputname, $this->field->defaultdata);
        }
    }

    /**
     * Sets the required flag for the field in the form object
     * @param   object   instance of the moodleform class
     */
    function edit_field_set_required($mform) {
        global $USER;
        if ($this->is_required() && ($this->userid == $USER->id)) {
            $mform->addRule($this->inputname, get_string('required'), 'required', null, 'client');
        }
    }

    /**
     * HardFreeze the field if locked.
     * @param   object   instance of the moodleform class
     */
    function edit_field_set_locked($mform) {
        if (!$mform->elementExists($this->inputname)) {
            return;
        }
        if ($this->is_locked() and !has_capability('moodle/user:update', get_context_instance(CONTEXT_SYSTEM))) {
            $mform->hardFreeze($this->inputname);
            $mform->setConstant($this->inputname, $this->data);
        }
    }

    /**
     * Hook for child classess to process the data before it gets saved in database
     * @param   mixed    $data
     * @param   stdClass $datarecord The object that will be used to save the record
     * @return  mixed
     */
    function edit_save_data_preprocess($data, $datarecord) {
        return $data;
    }

    /**
     * Loads a curse object with data for this field ready for the edit profile
     * form
     * @param   object   a course object
     */
    function edit_load_course_data($course) {
        if ($this->data !== null) {
            $course->{$this->inputname} = $this->data;
        }
    }

    /**
     * Check if the field data should be loaded into the user object
     * By default it is, but for field types where the data may be potentially
     * large, the child class should override this and return false
     * @return boolean
     */
    function is_user_object_data() {
        return true;
    }


    /***** The following methods generally should not be overwritten by child classes *****/

    /**
     * Accessor method: set the userid for this instance
     * @param   integer   id from the user table
     */
    function set_courseid($courseid) {
        $this->courseid = $courseid;
    }

    /**
     * Accessor method: set the fieldid for this instance
     * @param   integer   id from the user_info_field table
     */
    function set_fieldid($fieldid) {
        $this->fieldid = $fieldid;
    }

    /**
     * Accessor method: Load the field record and user data associated with the
     * object's fieldid and userid
     */
    function load_data() {
        global $DB;

        /// Load the field object
        if (($this->fieldid == 0) or (!($field = $DB->get_record('course_info_field', array('id' => $this->fieldid))))) {
            $this->field = null;
            $this->inputname = '';
        } else {
            $this->field = $field;
            $this->inputname = 'profile_field_'.$field->shortname;
        }

        if (!empty($this->field)) {
            if ($data = $DB->get_record('course_info_data', array('course_id' => $this->courseid, 'fieldid' => $this->fieldid), 'data, dataformat')) {
                $this->data = $data->data;
                $this->dataformat = $data->dataformat;
            } else {
                $this->data = $this->field->defaultdata;
                $this->dataformat = FORMAT_HTML;
            }
        } else {
            $this->data = null;
        }
    }

    /**
     * Check if the field data is visible to the current user
     * @return  boolean
     */
    function is_visible() {
        global $USER;

        switch ($this->field->visible) {
            case PROFILE_COURSE_FIELDS_VISIBLE_ALL:
                return true;
            case PROFILE_COURSE_FIELDS_VISIBLE_PRIVATE:
                if ($this->userid == $USER->id) {
                    return true;
                } else {
                    return has_capability('moodle/user:viewalldetails',
                            get_context_instance(CONTEXT_USER, $this->userid));
                }
            default:
                return has_capability('moodle/user:viewalldetails',
                        get_context_instance(CONTEXT_USER, $this->userid));
        }
    }

    /**
     * Check if the field data is considered empty
     * return boolean
     */
    function is_empty() {
        return ( ($this->data != '0') and empty($this->data));
    }

    /**
     * Check if the field is required on the edit profile page
     * @return   boolean
     */
    function is_required() {
        return (boolean)$this->field->required;
    }

    /**
     * Check if the field is locked on the edit profile page
     * @return   boolean
     */
    function is_locked() {
        return (boolean)$this->field->locked;
    }

    /**
     * Check if the field data should be unique
     * @return   boolean
     */
    function is_unique() {
        return (boolean)$this->field->forceunique;
    }

    /**
     * Check if the field should appear on the signup page
     * @return   boolean
     */
    function is_signup_field() {
        return (boolean)$this->field->signup;
    }


} /// End of class definition


/***** General purpose functions for customisable user profiles *****/

function local_course_profile_load_data($course) {
    global $CFG, $DB;

    if ($fields = $DB->get_records('course_info_field')) {
        foreach ($fields as $field) {
            require_once($CFG->dirroot.'/local/course_fields/profile/field/'.$field->datatype.'/field.class.php');
            $newfield = 'profile_field_'.$field->datatype;
            $formfield = new $newfield($field->id, $course->id);
            $formfield->edit_load_course_data($course);
        }
    }
}

/**
 * Print out the customisable categories and fields for a users profile
 * @param  object   instance of the moodleform class
 * @param int $userid id of user whose profile is being edited.
 */
function profile_course_fields_definition($mform, $categoryid = 0,$courseid = 0) {
    global $CFG, $DB;

    // if user is "admin" fields are displayed regardless
    // $update = has_capability('moodle/user:update', get_context_instance(CONTEXT_SYSTEM));

    if ($categories = $DB->get_records('course_info_categories', array('course_category' => $categoryid))) {
        foreach ($categories as $category) {
            $categoryInfo = $DB->get_record('course_info_category',array('id' => $category->categoryid));
            if ($fields = $DB->get_records('course_info_field', array('categoryid' => $category->categoryid))) {
                // check first if *any* fields will be displayed
                $display = false;
                foreach ($fields as $field) {
                    if ($field->visible != PROFILE_COURSE_FIELDS_VISIBLE_NONE) {
                        $display = true;
                    }
                }

                // display the header and the fields
                if ($display or $update) {
                    $mform->addElement('header', 'category_'.$category->id, format_string($categoryInfo->name));
                    foreach ($fields as $field) {
                        require_once($CFG->dirroot.'/local/course_fields/profile/field/'.$field->datatype.'/field.class.php');
                        $newfield = 'profile_field_'.$field->datatype;
                        $formfield = new $newfield($field->id, $courseid);
                        $formfield->edit_field($mform);
                    }
                }
            }
        }
    }
}

function profile_course_fields_definition_after_data($mform, $userid) {
    global $CFG, $DB;

    $userid = ($userid < 0) ? 0 : (int)$userid;

    if ($fields = $DB->get_records('course_info_field')) {
        foreach ($fields as $field) {
            require_once($CFG->dirroot.'/local/course_fields/profile/field/'.$field->datatype.'/field.class.php');
            $newfield = 'profile_field_'.$field->datatype;
            $formfield = new $newfield($field->id, $userid);
            $formfield->edit_after_data($mform);
        }
    }
}

function profile_course_fields_validation($usernew, $files) {
    global $CFG, $DB;

    $err = array();
    if ($fields = $DB->get_records('course_info_field')) {
        foreach ($fields as $field) {
            require_once($CFG->dirroot.'/local/course_fields/field/'.$field->datatype.'/field.class.php');
            $newfield = 'profile_field_'.$field->datatype;
            $formfield = new $newfield($field->id, $usernew->id);
            $err += $formfield->edit_validate_field($usernew, $files);
        }
    }
    return $err;
}

function profile_course_fields_save_data($coursenew) {
    global $CFG, $DB;
    // echo "<pre>";print_r($coursenew);die();
    if ($fields = $DB->get_records('course_info_field')) {
        foreach ($fields as $field) {
            require_once($CFG->dirroot.'/local/course_fields/profile/field/'.$field->datatype.'/field.class.php');
            $newfield = 'profile_field_'.$field->datatype;
            $formfield = new $newfield($field->id, $coursenew->id);
            $formfield->edit_save_data($coursenew);
        }
    }
}

function profile_course_fields_display_fields($userid) {
    global $CFG, $USER, $DB;

    if ($categories = $DB->get_records('user_info_category', null, 'sortorder ASC')) {
        foreach ($categories as $category) {
            if ($fields = $DB->get_records('user_info_field', array('categoryid' => $category->id), 'sortorder ASC')) {
                foreach ($fields as $field) {
                    require_once($CFG->dirroot.'/user/profile/field/'.$field->datatype.'/field.class.php');
                    $newfield = 'profile_field_'.$field->datatype;
                    $formfield = new $newfield($field->id, $userid);
                    if ($formfield->is_visible() and !$formfield->is_empty()) {
                        print_row(format_string($formfield->field->name.':'), $formfield->display_data());
                    }
                }
            }
        }
    }
}

/**
 * Adds code snippet to a moodle form object for custom profile fields that
 * should appear on the signup page
 * @param  object  moodle form object
 */
function profile_course_fields_signup_fields($mform) {
    global $CFG, $DB;

     // only retrieve required custom fields (with category information)
    // results are sort by categories, then by fields
    $sql = "SELECT uf.id as fieldid, ic.id as categoryid, ic.name as categoryname, uf.datatype
                FROM {user_info_field} uf
                JOIN {user_info_category} ic
                ON uf.categoryid = ic.id AND uf.signup = 1 AND uf.visible<>0
                ORDER BY ic.sortorder ASC, uf.sortorder ASC";

    if ( $fields = $DB->get_records_sql($sql)) {
        foreach ($fields as $field) {
            // check if we change the categories
            if (!isset($currentcat) || $currentcat != $field->categoryid) {
                 $currentcat = $field->categoryid;
                 $mform->addElement('header', 'category_'.$field->categoryid, format_string($field->categoryname));
            }
            require_once($CFG->dirroot.'/user/profile/field/'.$field->datatype.'/field.class.php');
            $newfield = 'profile_field_'.$field->datatype;
            $formfield = new $newfield($field->fieldid);
            $formfield->edit_field($mform);
        }
    }
}

/**
 * Returns an object with the custom profile fields set for the given user
 * @param  integer  userid
 * @return  object
 */
function profile_course_fields_user_record($userid) {
    global $CFG, $DB;

    $usercustomfields = new stdClass();

    if ($fields = $DB->get_records('user_info_field')) {
        foreach ($fields as $field) {
            require_once($CFG->dirroot.'/user/profile/field/'.$field->datatype.'/field.class.php');
            $newfield = 'profile_field_'.$field->datatype;
            $formfield = new $newfield($field->id, $userid);
            if ($formfield->is_user_object_data()) {
                $usercustomfields->{$field->shortname} = $formfield->data;
            }
        }
    }

    return $usercustomfields;
}

/**
 * Load custom profile fields into user object
 *
 * Please note originally in 1.9 we were using the custom field names directly,
 * but it was causing unexpected collisions when adding new fields to user table,
 * so instead we now use 'profile_' prefix.
 *
 * @param object $user user object
 * @return void $user object is modified
 */
function profile_course_fields_load_custom_fields($user) {
    $user->profile = (array)profile_user_record($user->id);
}


