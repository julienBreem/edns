<?php

    namespace edns\Controller\CLI\taskmanager;
    require_once(__DIR__.'/../../Model/Entity/Task.php');
    use edns\Model\Entity\Task as Taskentity;

    class taskmanager
    {
        var $count;
        var $Taskarray;

        public function __construct(){
            //$this->Taskarray[] = new Taskentity();
            $this.count == 0;
        }
        public static function gathertasksinput() {

            do {
                echo "Type in your tasks details (or nothing to cancel this out): ";
                $handle = fopen("php://stdin", "r");
                $line = fgets($handle);

            }while($this.setnewtask($line));
        }

        private function setnewtask($input){
        //

            if ($input == ''){
                return 0;
            }
            ++$this.count;
            $this.$Taskarray[$this.count - 1] = new Taskentity($this.count);
            $this.$Taskarray[$this.count - 1].setTaskid($this.count);
            $this.$Taskarray[$this.count - 1].setdetails($input);
            //implement name and date
            return 1;
        }

        public function outputTasks(){
           // $this.$Taskarray[];
            foreach ($this.Taskarray as $task){
                echo "Task " . $task.getTaskid() ."".PHP_Eol;
                echo "Task " . $task.getDetails() ."".PHP_Eol;
            }
        }

}