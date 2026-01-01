<?php 

	include 'init.php';
	require_write_token();

	$request = htmlspecialchars($_POST['request'], ENT_QUOTES);

	if ($request == 'valves') {
		$valve_id = htmlspecialchars($_POST['valve_id'], ENT_QUOTES);
		$valve_type = htmlspecialchars($_POST['valve_type'], ENT_QUOTES);
		$valve_dma_id = htmlspecialchars($_POST['valve_dma_id'], ENT_QUOTES);
		$valve_diameter = htmlspecialchars($_POST['valve_diameter'], ENT_QUOTES);
		$valve_visibility = htmlspecialchars($_POST['valve_visibility'], ENT_QUOTES);
		$valve_location = htmlspecialchars($_POST['valve_location'], ENT_QUOTES);
		$valve_geometry = $_POST['valve_geometry'];

		$check = $pdo->prepare("SELECT 1 FROM valves WHERE valve_id = :valve_id");
		$check->execute([':valve_id' => $valve_id]);

		if ($check->rowCount() > 0) {
			echo "ERROR: Valve ID already exists. Please choose a new ID";
		} else {
			$stmt = $pdo->prepare("INSERT INTO valves(valve_id, valve_type, valve_dma_id, valve_diameter, valve_visibility, valve_location, geom) VALUES (:valve_id, :valve_type, :valve_dma_id, :valve_diameter, :valve_visibility, :valve_location, ST_SetSRID(ST_GeomFromGeoJSON(:valve_geometry), 4326))");
			$stmt->execute([
				':valve_id' => $valve_id,
				':valve_type' => $valve_type,
				':valve_dma_id' => $valve_dma_id,
				':valve_diameter' => $valve_diameter,
				':valve_visibility' => $valve_visibility,
				':valve_location' => $valve_location,
				':valve_geometry' => $valve_geometry
			]);
		}

	}


	if ($request == 'pipelines') {
		$pipeline_id = htmlspecialchars($_POST['pipeline_id'], ENT_QUOTES);
		$pipeline_category = htmlspecialchars($_POST['pipeline_category'], ENT_QUOTES);
		$pipeline_dma_id = htmlspecialchars($_POST['pipeline_dma_id'], ENT_QUOTES);
		$pipeline_diameter = htmlspecialchars($_POST['pipeline_diameter'], ENT_QUOTES);
		$pipeline_material = htmlspecialchars($_POST['pipeline_material'], ENT_QUOTES);
		$pipeline_location = htmlspecialchars($_POST['pipeline_location'], ENT_QUOTES);
		$pipeline_geometry = $_POST['pipeline_geometry'];

		$check = $pdo->prepare("SELECT 1 FROM pipelines WHERE pipe_id = :pipeline_id");
		$check->execute([':pipeline_id' => $pipeline_id]);

		if ($check->rowCount() > 0) {
			echo "ERROR: Pipeline ID already exists. Please choose a new ID";
		} else {
			$stmt = $pdo->prepare("INSERT INTO pipelines(pipe_id, pipeline_category, pipeline_dma_id, pipeline_diameter, pipeline_material, pipeline_location, geom) VALUES (:pipeline_id, :pipeline_category, :pipeline_dma_id, :pipeline_diameter, :pipeline_material, :pipeline_location, ST_SetSRID(ST_GeomFromGeoJSON(:pipeline_geometry), 4326))");
			$stmt->execute([
				':pipeline_id' => $pipeline_id,
				':pipeline_category' => $pipeline_category,
				':pipeline_dma_id' => $pipeline_dma_id,
				':pipeline_diameter' => $pipeline_diameter,
				':pipeline_material' => $pipeline_material,
				':pipeline_location' => $pipeline_location,
				':pipeline_geometry' => $pipeline_geometry
			]);
		}

	}

	if ($request == 'buildings') {

		$account_no = htmlspecialchars($_POST['account_no'], ENT_QUOTES);
		$building_category = htmlspecialchars($_POST['building_category'], ENT_QUOTES);
		$building_dma_id = htmlspecialchars($_POST['building_dma_id'], ENT_QUOTES);
		$building_storey = htmlspecialchars($_POST['building_storey'], ENT_QUOTES);
		$building_population = htmlspecialchars($_POST['building_population'], ENT_QUOTES);
		$building_location = htmlspecialchars($_POST['building_location'], ENT_QUOTES);
		$building_geometry = $_POST['building_geometry'];

		$check = $pdo->prepare("SELECT 1 FROM buildings WHERE account_no = :account_no");
		$check->execute([':account_no' => $account_no]);

		if ($check->rowCount() > 0) {
			echo "ERROR: Account no already exists for another building. Please choose a new Account No.";
		} else {
			$stmt = $pdo->prepare("INSERT INTO buildings(account_no, building_category, building_dma_id, building_storey, building_population, building_location, geom) VALUES (:account_no, :building_category, :building_dma_id, :building_storey, :building_population, :building_location, ST_SetSRID(ST_GeomFromGeoJSON(:building_geometry), 4326))");
			$stmt->execute([
				':account_no' => $account_no,
				':building_category' => $building_category,
				':building_dma_id' => $building_dma_id,
				':building_storey' => $building_storey,
				':building_population' => $building_population,
				':building_location' => $building_location,
				':building_geometry' => $building_geometry
			]);
		}
	}	


 ?>
