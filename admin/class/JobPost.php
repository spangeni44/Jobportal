<?php 
	class JobPost extends Database{
	public function __construct(){
		Database::__construct();
		$this->table('job_posts');
	}

	public function addJobPost($data, $is_die = false){
		return $this->insert($data, $is_die);
	}
	
	public function getAllJobPosts($is_die = false){
		return $this->select([], $is_die);
	}
    public function getAllJobPostsWithLimit($data, $is_die=false){
        $args=array(
            'order_by'=>$data['order_by'],
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
            );
            return $this->selectInDesc($args,$is_die);
    }
	public function getJobPostById($job_id, $is_die = false){
		$args = array(
			'where' => array(
					'id' => $job_id
			)
		);
		return $this->select($args, $is_die);
	}
	public function deleteJobPost($job_id, $is_die = false){
		$args = array(
			'where' => array(
					'id' => $job_id
			)
		);
		return $this->delete($args, $is_die);	
	}

	public function updateJobPost($data, $job_id, $is_die=false){
		$args = array(
			'where' => array(
					'id' => $job_id
			)
		);
		$success = $this->update($data, $args, $is_die);
		if($success){
			return $job_id;
		} else {
			return false;
		}
    }
    public function getJobPostByUserId($user_id,$is_die=false){
        $args=array(
            'where'=>array(
                'added_by'=>$user_id
            )
            );
            return $this->select($args,$is_die);
    }
    public function getJobPostByUserIdWithLimit($data, $is_die=false){
        $args=array(
            'where'=>array(
                'added_by'=>$data['added_by']
            ),
            'order_by'=>$data['order_by'],
            'start'=>$data['start'],
            'perpage'=>$data['perpage']
            );
            return $this->selectInDesc($args,$is_die);
    }

    public function getJobPostByTitleOrJobType($job_title, $job_type,$is_die=false){
        // debug($job_title.$job_type,true);
        if(isset($job_title) && !empty($job_title)){
            if(isset($job_type) && !empty($job_type)){
            $args=array(
                'where'=> array(
                    'position'=>$job_title,
                    'employment_type'=>$job_type
                )
            );
           }else{
                $args=array(
                    'where'=> array(
                            'position'=>$job_title
                    )
                );
            }
        }
       if(isset($job_type) && !empty($job_type)){
           if(isset($job_title) && !empty($job_title)){
                $args=array(
                    'where'=> array(
                        'position'=>$job_title,
                        'employment_type'=>$job_type
                    )
                );
           }else{
            $args=array(
                'where'=> array(
                        'employment_type'=>$job_type
                    )
                );
            }
       }
       if(isset($job_title) && !empty($job_title)){
          $args=array('where'=>array(
               'position'=>$job_title
            )
          );
       }
       return $this->select($args, $is_die);
    }

    public function getJobPostByTitleOrJobTypeWithLimit($data, $is_die=false){
        if(isset($data['position']) && !empty($data['position'])){
            if(isset($data['employment_type']) && !empty($data['employment_type'])){
            $args=array(
                'where'=> array(
                    'position'=>$data['position'],
                    'employment_type'=>$data['employment_type']
                ),
                'limit'=>array(
                    'start'=>$data['start'],
                    'perpage'=>$data['perpage']
                )
            );
           }else{
                $args=array(
                    'where'=> array(
                            'position'=>$data['position']
                    ),
                    'limit'=>array(
                        'start'=>$data['start'],
                        'perpage'=>$data['perpage']
                    )
                );
            }
        }
       if(isset($data['employment_type']) && !empty($data['employment_type'])){
           if(isset($data['position']) && !empty($data['position'])){
                $args=array(
                    'where'=> array(
                        'employment_type'=>$data['employment_type'],
                        'position'=>$data['position']
                    ),
                    'limit'=>array(
                        'start'=>$data['start'],
                        'perpage'=>$data['perpage']
                    )
                );
           }else{
            $args=array(
                'where'=> array(
                        'employment_type'=>$data['employment_type']
                    ),
                    'limit'=>array(
                        'start'=>$data['start'],
                        'perpage'=>$data['perpage']
                    )
                );
            }
       }
       if(isset($data['position']) && !empty(data['position'])){
          $args=array(
              'where'=>array(
               'position'=>$data['position']
            ),
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
          );
       }
       return $this->selectInDesc($args, $is_die);
    }

    public function getAllInstantJobs($is_die = false){
		$args = array(
			'where' => array(
					'is_instant_job' => 'yes'
            )
		);
		return $this->select($args, $is_die);
    }
    public function getAllHotJobs($is_die = false){
		$args = array(
			'where' => array(
                    'is_hot_job' => 'yes'
            )
            
		);
		return $this->select($args, $is_die);
    }

    //test
    public function getHotJobs($data, $is_die=false){
           $args=array(
               'where'=>array(
                   'is_hot_job'=>'yes'
               ),
               'limit'=>array(
                   'start'=>$data['start'],
                   'perpage'=>$data['perpage']
               )
           ); 
           return $this->selectInDesc($args, $is_die);
    }
    //Test function 
    public function getAllJobsByDescWithLimit($data,$is_die=false){
        $args=array(
            'order_by'=>'id',
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
        ); 

        return $this->selectInDesc($args, $is_die);
    }
    public function getTotalJobPostByCategory($category_id, $is_die=false){
        $args=array(
            'where'=>array(
                'job_category'=>$category_id
            )
        );
        return $this->select($args,$is_die);
    }
    public function getTotalJobPostByCategoryWithLimit($data, $is_die=false){
        $args=array(
            'where'=>array(
                'job_category'=>$data['category_id']
            ),
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
        );
        return $this->selectInDesc($args,$is_die);
    }
    public function getTotalJobPostByType($job_type, $is_die=false){
        $args=array(
            'where'=>array(
                'employment_type'=>$job_type
            )
        );
        return $this->select($args,$is_die);
    }
    public function getTotalJobPostByTypeWithLimit($data, $is_die=false){
        $args=array(
            'where'=>array(
                'employment_type'=>$data['job_type']
            ),
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
        );
        return $this->selectInDesc($args,$is_die);
    }
    public function getTotalJobPostByLocation($location, $is_die=false){
        $args=array(
            'where'=>array(
                'job_location'=>$location
            )
        );
        return $this->select($args,$is_die);
    }
    public function getTotalJobPostByLocationWithLimit($data, $is_die=false){
        $args=array(
            'where'=>array(
                'job_location'=>$data['location']
            ),
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
        );
        return $this->selectInDesc($args,$is_die);
    }
    public function getTotalJobPostBySource($source, $is_die=false){
        $args=array(
            'where'=>array(
                'source'=>$source
            )
        );
        return $this->select($args,$is_die);
    }
    public function getTotalJobPostBySourceWithLimit($data, $is_die=false){
        $args=array(
            'where'=>array(
                'source'=>$data['job_source']
            ),
            'limit'=>array(
                'start'=>$data['start'],
                'perpage'=>$data['perpage']
            )
        );
        return $this->selectInDesc($args,$is_die);
    }



     public function getSpecificJobPosts($data,$is_die=false){
    //   if(isset($data['search_title']) && !empty($data['search_title'])){
    //     $args=array(
    //               'where'=>array(
    //                     'position'=>$data['search_title']
    //               )
    //     );
    //   }
    //   if(isset($data['search_location']) && !empty($data['search_location'])){
    //     $args=array(
    //               'where'=>array(
    //                     'job_location'=>$data['search_location']
    //               )
    //     );
    //   }
    //   if(isset($data['search_category']) && !empty($data['search_category'])){
    //     $args=array(
    //               'where'=>array(
    //                     'job_category'=>$data['search_category']
    //               )
    //     );
    //   }
    //   if(isset($data['search_job_type']) && !empty($data['search_job_type'])){
    //     $args=array(
    //               'where'=>array(
    //                     'employment_type'=>$data['search_job_type']
    //               )
    //     );
    //   }
    //   if(isset($data['search_title']) && !empty($data['search_title']) && isset($data['search_location']) && !empty($data['search_location'])){
    //     $args=array(
    //               'where'=>array(
    //                     'employment_type'=>$data['search_job_type'],
    //                     'job_location'=>$data['search_location']
    //               )
    //     );
    //   }
    //    return $this->select($args, $is_die);
     }
}
 ?>