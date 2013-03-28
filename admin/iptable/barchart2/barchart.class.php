<?php

     class Record {

           public $name;

           public $value;

                  public function __construct($n,$v) {

                         $this->name = $n; 

                         $this->value = $v;
                  }

     }//end class Record


     class Barchart {

          private $data = array();

          private $width;

          private $height;

          private $gap;
           
                   public function __construct($width,$height,$arr,$gap) {

                          $this->width = $width;

                          $this->height = $height;

                          $this->gap = $gap;

                          foreach($arr as $vec) {

                                  $this->data[] = $vec;
                          }

                   }            

                   public function getMax() {

                          $max = -1;

                          foreach($this->data as $d) {

                                  $v = $d->value;

                                  if($v > $max) {$max = $v;}       
                          }

                      return($max);
                   }

                   public function renderGraph() {

                          $n = count($this->data);
 
                          $output = '<div class="container" style="width:'.$this->width.'px"><table cellpadding="0" cellspacing="0" class="barchart" style="width:'.$this->width.'px;height: '.$this->height.'px">';

                          $max = $this->getMax();

                          $k = $this->width/$max;

                          foreach($this->data as $d) {

                                  $brw = floor($this->width - ($d->value * $k));
                        
                                  $output .= '<tr><td style="border-bottom-width:'.$this->gap.'px;border-right-width: '.$brw.'px"><span>'.substr($d->name,0,3).'('.$d->value.')</span></td></tr>';
                          }

                          $output .= '</table></div>'; 


                          return$output; 
                   }

     }//end class Barchart


?>

