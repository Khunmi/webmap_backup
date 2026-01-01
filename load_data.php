<?php

	include 'init.php';

	$allowed = [
		'valves' => 'valve_dma_id',
		'pipelines' => 'pipeline_dma_id',
		'buildings' => 'building_dma_id'
	];

	$table = htmlspecialchars($_POST['table'], ENT_QUOTES);
	$dma_id = htmlspecialchars($_POST['dma_id'], ENT_QUOTES);

	if (!isset($allowed[$table])) {
		exit('ERROR Invalid table');
	}

	$dma_id_field = $allowed[$table];
	$sql = "SELECT *, ST_AsGeoJSON(geom) as geojson FROM {$table} WHERE {$dma_id_field} = :dma_id";

	try {

		$result = $pdo->prepare($sql);
		$result->execute([':dma_id' => $dma_id]);
		$features = [];

		foreach($result as $row) {
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
