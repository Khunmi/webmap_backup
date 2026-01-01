<?php 

	include 'init.php';
	require_write_token();

	$request = htmlspecialchars($_POST['request'], ENT_QUOTES);

	if ($request == 'buildings') {
		$building_database_id = htmlspecialchars($_POST['building_database_id'], ENT_QUOTES);

		try {
			$stmt = $pdo->prepare("DELETE FROM buildings WHERE building_database_id = :building_database_id");
			$stmt->execute([':building_database_id' => $building_database_id]);

		} catch(PDOException $e) {
			echo "ERROR ".$e->getMessage();
		}
	}

	if ($request == 'pipelines') {
		$pipeline_database_id = htmlspecialchars($_POST['pipeline_database_id'], ENT_QUOTES);

		try {
			$stmt = $pdo->prepare("DELETE FROM pipelines WHERE pipeline_database_id = :pipeline_database_id");
			$stmt->execute([':pipeline_database_id' => $pipeline_database_id]);

		} catch(PDOException $e) {
			echo "ERROR ".$e->getMessage();
		}
	}

	if ($request == 'valves') {
		$valve_database_id = htmlspecialchars($_POST['valve_database_id'], ENT_QUOTES);

		try {
			$stmt = $pdo->prepare("DELETE FROM valves WHERE valve_database_id = :valve_database_id");
			$stmt->execute([':valve_database_id' => $valve_database_id]);

		} catch(PDOException $e) {
			echo "ERROR ".$e->getMessage();
		}
	}


 ?>
