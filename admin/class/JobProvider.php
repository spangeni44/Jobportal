<?php 
	class JobProvider extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('job_provider_info');
	}

	public function addJobProvider($data, $is_die = false){
		return $this->insert($data, $is_die);
	}
	
	public function getAllJobProvider($is_die = false){
		return $this->select([], $is_die);
	}

	public function getJobProviderById($job_provider_id, $is_die = false){
		$args = array(
			'where' => array(
					'id' => $job_provider_id
			)
		);
		return $this->select($args, $is_die);
	}

	public function deleteJobProvider($job_provider_id, $is_die = false){
		$args = array(
			'where' => array(
					'id' => $job_provider_id
			)
		);
		return $this->delete($args, $is_die);	
	}

	public function updateJobProvider($data, $job_provider_id, $is_die=false){
		$args = array(
			'where' => array(
					'id' => $job_provider_id
			)
		);
		$success = $this->update($data, $args, $is_die);
		if($success){
			return $job_provider_id;
		} else {
			return false;
		}
	}
	public function getJobProviderByUserId($user_id, $is_die=false){
		$args=array(
			'where'=>array(
						'user_id'=>$user_id
			)
		);
		return $this->select($args,$is_die);
	}
}
 ?>