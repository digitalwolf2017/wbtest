<?php

$lead_id=$_GET['lead_id'] ?? '';

$brochure = isset($_GET['brochure']) && in_array($_GET['brochure'], ['1', '2']) ? '?brochure=' . $_GET['brochure'] : '';

header("Location: thankyou.php" . $brochure);

exit;

?>