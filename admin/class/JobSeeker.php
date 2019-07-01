<?php 
	class JobSeeker extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('job_seeker_info');
	}

	public function addJobSeeker($data, $is_die = false){
		return $this->insert($data, $is_die);
	}
	
	public function getAllJobSeeker($is_die = false){
		return $this->select([], $is_die);
	}

	public function getJobSeekerById($job_seeker_id, $is_die = false){
		$args = array(
			'where' => array(
					'id' => $job_seeker_id
			)
		);
		return $this->select($args, $is_die);
	}

	public function deleteJobSeeker($job_seeker_id, $is_die = false){
		$args = array(
			'where' => array(
					'id' => $job_seeker_id
			)
		);
		return $this->delete($args, $is_die);	
	}

	public function updateJobSeeker($data, $job_seeker_id, $is_die=false){
		$args = array(
			'where' => array(
					'id' => $job_seeker_id
			)
		);
		$success = $this->update($data, $args, $is_die);
		if($success){
			return $job_seeker_id;
		} else {
			return false;
		}
    }
    public function getJobSeekerByUserId($id, $is_die=false){
        $args=array(
            'where'=>array(
                'user_id'=>$id
            )
        );
        return $this->select($args, $is_die);
    }


	public function getAllJobSeekersDetail($is_die=false){
		$args=array(
			'LEFT OUTER JOIN'=>'users',
			'ON'=> array(
					'job_seeker_detail.user_id'=>'users.id'
			)
		);
		return $this->select($args, $is_die);
	}
}
 ?>