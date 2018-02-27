<?php
	$dom = simplexml_load_file("student.xml");

	foreach ($dom->student as $h) {
		echo "<b>Student Name:</b> $h->name"."<br><br>";
		echo "<b>ID:</b> $h->id"."<br><br>";
		echo "<b>CGPA:</b> $h->cgpa"."<br><br>";
		echo "<b>Course Taken:</b>"."<br>";

		foreach ($h->courses->course as $f) {
			echo "<li>" . $f->cname . " | Section: " . $f->csection . " | Grade: " . $f->cgrade . "</li>";
			//echo "<ol><li>" . $f->cname . " | Section: " . $f->csection . " | Grade: " . $f->cgrade . "</li></ol>";
		}

		echo "<br><hr>";
	}
?>