<?php

	include 'init.php';

	$allowed = [
		'valves' => ['valve_id'],
		'pipelines' => ['pipe_id'],
		'buildings' => ['account_no']
	];

	$table = htmlspecialchars($_POST['table'], ENT_QUOTES);
	$field = htmlspecialchars($_POST['field'], ENT_QUOTES);
	$value = htmlspecialchars($_POST['value'], ENT_QUOTES);

	if (!isset($allowed[$table]) || !in_array($field, $allowed[$table], true)) {
		exit('ERROR Invalid table or field');
	}

	try {
		$sql = "SELECT *, ST_AsGeoJSON(geom) as geojson FROM {$table} WHERE {$field} = :value";
		$stmt = $pdo->prepare($sql);
		$stmt->execute([':value' => $value]);
		$features = [];

		foreach($stmt as $row) {
			unset($row['geom']);
			$geometry = json_decode($row['geojson']);

			unset($row['geojson']);

			$feature = ["type"=>"Feature", "geometry"=>$geometry, "properties"=>$row];
			array_push($features,$feature);
		}

		$featureCollection = ["type"=>"FeatureCollection", "features"=>$features];
		echo json_encode($featureCollection);

	} catch(PDOException $e) {
		echo "ERROR ".$e->getMessage();
	}

?>
