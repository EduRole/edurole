<?php
class optionBuilder {

	public $core;

	public function __construct($core) {

		$this->core = $core;
	}

	public function buildSelect($run, $selected = NULL) {
		$begin = "";
		$out = "";

		if (!empty($run)) {

			foreach ($run as $row) {

				$name = $row[1];
				$uid = $row[0];

				if ($uid == $selected) {
					$sel = 'selected="selected"'; 
				} else {
					$sel = "";
				}

				if ($uid == $selected) {
					$begin = '<option value="' . $uid . '" ' . $sel . '>' . $name . '</option>';
				}else{
					$out = $out . '<option value="' . $uid . '" ' . $sel . '>' . $name . '</option>';
				}
			}

		} else {

			$out = $out . '<option value="">No information available</option>';

		}

		$out = $begin . $out;
		return $out;
	}

	function showPeriods($study, $selected = null) {

		if ($study != null) {
			$sql = "SELECT `periods`.ID, CONCAT(`periods`.Year, ' - ', `periods`.Name) FROM `periods`";
		} else {
			$sql = "SELECT `periods`.ID, CONCAT(`periods`.Year, ' - ', `periods`.Name) FROM `periods`";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showCentres($centre, $selected = null) {

		if ($study != null) {
			$sql = "SELECT  DISTINCT `student-data-other`.ExamCentre, `student-data-other`.ExamCentre FROM `student-data-other`";
		} else {
			$sql = "SELECT  DISTINCT `student-data-other`.ExamCentre, `student-data-other`.ExamCentre FROM `student-data-other`";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showPrograms($study, $selected = null) {

		if ($study != null) {
			$sql = "SELECT `programmes`.ID, `programmes`.ProgramName FROM `programmes`, `study-program-link` WHERE `study-program-link`.StudyID = '$study' AND `study-program-link`.ProgramID = `programmes`.ID ORDER BY `programmes`.`ProgramName`";
		} else {
			$sql = "SELECT `ID`, `ProgramName` FROM `programmes` ORDER BY `ProgramName`";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}
	

	function showFeepackages($study, $selected = null) {

		if ($study != null) {
			$sql = "SELECT * FROM `fee-package`,`fee-package-study-link` WHERE `fee-package-study-link`.StudyID = '$study' AND `fee-package-study-link`.FeePackageID = `fee-package`.ID";
		} else {
			$sql = "SELECT * FROM `fee-package` ORDER BY `fee-package`.Name";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}


	function showCourses($program, $selected = null) {

		if ($program != null) {
			$sql = "SELECT * FROM `courses`, `programmes`, `program-course-link` WHERE `program-course-link`.CourseID = `courses`.ID AND `program-course-link`.ProgramID = `programmes`.ID AND `program-course-link`.ProgramID = $program ORDER BY `courses`.`Name`";
		} else {
			$sql = "SELECT `ID`, `Name` FROM `courses` ORDER BY `courses`.`Name`";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showPCourses($program, $selected = null) {

		if ($program != null) {
			$sql = "SELECT * FROM `courses`, `course-prerequisites` WHERE `course-prerequisites`.Prerequisites= `courses`.ID AND `course-prerequisites`.CourseID = $program ORDER BY `courses`.`Name`";
		} else {
			$sql = "SELECT `ID`, `Name` FROM `courses` ORDER BY `courses`.`Name`";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showCoursesV($program, $selected = null) {

		if ($program != null) {
			$sql = "SELECT `Name`, `Name` FROM `courses`, `programmes`, `program-course-link` WHERE `program-course-link`.CourseID = `courses`.ID AND `program-course-link`.ProgramID = `programmes`.ID AND `program-course-link`.ProgramID = $program ORDER BY `courses`.`Name`";
		} else {
			$sql = "SELECT `ID`, `Name` FROM `courses` ORDER BY `courses`.`Name`";
		}

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showUsers($role, $selected = null) {

		$sql = "SELECT `basic-information`.`ID`, CONCAT(`FirstName`, ' ', `Surname`) FROM `basic-information`, `access`, `roles` WHERE `access`.`ID` = `basic-information`.`ID` AND `access`.`RoleID` = `roles`.`ID` AND `access`.`RoleID` >= '$role'";

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showPaymentTypes($selected = null) {

		$sql = "SELECT `ID`, `Value`, `Name` FROM `settings` WHERE `Name` LIKE 'PaymentType%' ORDER BY `Name`";

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showSchools($selected = null) {

		$sql = "SELECT `ID`, `Name` FROM `schools`";

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showStudies($selected = null) {

		$sql = "SELECT `ID`, `Name` FROM `study`";

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}

	function showRoles($selected = null) {

		$sql = "SELECT `ID`, `RoleName` FROM `roles`";

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}


	function showPermissions($selected = null) {

		$sql = "SELECT `ID`, `PermissionDescription` FROM `permissions`";

		$run = $this->core->database->doSelectQuery($sql);
		$out = $this->core->database->fetch_all($run);

		return ($out);
	}

	function showAccommodation($selected = null) {

		$sql = "SELECT `ID`, `Name` FROM `accommodation`";

		$run = $this->core->database->doSelectQuery($sql);
		$fetch = $this->core->database->fetch_all($run);
		$out = $this->buildSelect($fetch, $selected);

		return ($out);
	}


}

?>
