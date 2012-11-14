<?php

class Tracker_Controller extends Base_Controller {
    

    public function action_index()
    {
         //all jobs due this week
        $due = job::where('reqid', '=', 'AA-7')->get();

        //all jobs in assigned
        $assigned = job::where('projstatus', '=', 'assigned')->get();

        //all jobs in progress
        $progress = job::where('projstatus', '=', 'inprogress')->get();

        //proof out
        $proof = job::where('projstatus', '=', 'proofout')->get();

        //finished
        // $finished = job::count();
        
        //all jobs
        $jobs = job::all();
// dd($jobs);
       return View::make('tracker.index', array('jobs' => $jobs,
       											'due' => $due,
       											'assigned' => $assigned,
       											'progress' => $progress,
       											'proof' => $proof
       	));

    }

}