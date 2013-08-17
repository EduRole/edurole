<?php
class components {

	public static function generateBreadcrumb($classname, $functionname) {

		$pathArray = classNamespace::getNamespace($classname);
		$crumb = "";

		foreach ($pathArray['executionpath'] as $class => $name) {

			if (!$name == "home") {
				$functionalName = classNamespace::getNamespace($name);
			} else {
				$functionalName['functionalname'] = "home";
			}

			$crumb .= '<a href="' . $name . '">' . $functionalName['functionalname'] . '</a> > ';
		}

		$crumbstart = '<div class="breadcrumb">';
		$crumbend = '</div>';

		$currentClass = $pathArray['functionalname'];

		$completecrumb = $crumbstart . $crumb . $currentClass . $crumbend;

		return ($completecrumb);
	}

	public static function generateTitle($title, $description) {
		$title = '<div class="contentpadfull">' .
			'<p class="title">' . $title . '</p>' .
			'<p><b>' . $description . '</b> </b></p>';

		return ($title);
	}

}

?>