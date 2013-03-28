<?php
/*
 *
 *      Create constant object with Singleton
 *      @class Database  
*/

          class Database {

              private static $instance = NULL;

              private $result;

              const localhost = "localhost";

              const user = "thinkphp_lancia";

              const password = "adidas88";

              const db = "thinkphp_aldovet";

                    //constructor of class is private
                    private function __construct() {

                            if(!$link = @mysql_connect(self::localhost,self::user,self::password)) {

                                        throw new Exception($this->error());
                            }

                            if(!@mysql_select_db(self::db,$link)){

                                        throw new Exception($this->error());
                            }

                    }//end method

                    //get instance static method
                    public static function getInstance() {

                           if(self::$instance == NULL) {

                                    self::$instance = new Database();
                           }

                         return self::$instance;

                    }//end method

                    //public method query
                    public function query($q) {

                         $this->result = mysql_query($q);

                         if(!$this->result) {echo"Could not successfully run query($sql) from DB: ".$this->error();} 

                                   else 
      
                                            {return true;}
                    }//end method

                    //get number of results
                    public function getRows() {
 
                           return mysql_num_rows($this->result);

                    }//end method


                    //display the result in table
                    public function display($width,$offset) {

                         //if we have results then push in array
                         while($row = mysql_fetch_assoc($this->result)) {

                               $this->vec[] = $row;             

                         }//endwhile
 
                         $this->arr2table($this->vec,$width,$offset+1);

                    }//end method

  
                    //transform array to table
                     public function arr2table($arr,$width,$offset) {

                         $count = count($arr);

                         $innercount = $offset;

                         if($count > 0){

                             reset($arr);

                             $num = count(current($arr));

                             echo "<table align=\"center\" border=\"1\" cellpadding=\"5\" cellspacing=\"0\" width=\"$width\">\n";

                             echo "<thead>\n";

                             echo"<th>useid.</th>";

                             foreach(current($arr) as $key => $value) {

                                     echo "<th>";

                                     echo $key."&nbsp;";

                                     echo "</th>\n";  

                             }//end foreach 

                             echo "</thead>\n";

                             while($curr_row = current($arr)) {

                                   echo "<tr>\n";

                                   $col = 1;

                                   echo"<td>$innercount</td>";

                                  while (false !== ($curr_field = current($curr_row))) {

                                         echo "<td>";

                                         echo $curr_field."&nbsp;";

                                         echo "</td>\n";

                                         next($curr_row);

                                         $col++;
                                   }

                                   while($col <= $num){

                                         echo "<td>&nbsp;</td>\n";

                                         $col++;      

                                    }

                                   echo "</tr>\n";
 
                                   next($arr);

                                   $innercount++;

                             }//end while

                            echo "</table>\n";
 
                           }//end if

                      }//end method



                  //@method that drop a table sent as parameter
                  public function delete_table($table) {

                         $table = addSlashes($table);

                         $sql = "drop table $table";

                         echo$sql;

                         $r = @mysql_query($sql);

                        if($r) {return true;}

                            else {return false;}

                 }//end method

 
                //@method that check weather we have a table or not
                public function table_exists($table) {

                      $table = addSlashes($table);

                      $sql = "SELECT * FROM $table";

                      $r = @mysql_query($sql);

                      if($r) {return true;}

                         else {return false;}

                }//end method

                //display the results in format JSON
                public function displayJSON() {

                       $arr = array();

                       //if we have results then push in array
                       while($row = mysql_fetch_assoc($this->result)) {

                               $arr[] = $row;             

                       }//endwhile
 
                   //return in format JSON
                   return json_encode($arr);
                }


          }//end class


?>