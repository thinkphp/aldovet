<?php

     class Record {

           public $name;

           public $value;

               public function __construct($n,$v) {

                      $this->name = $n; 

                      $this->value = $v;
               } 
  
     }//end class

     class RecordList {

           private $data = array();

                   public function __construct($arr) {

                          foreach($arr as $a) {

                             $this->data[] = $a;
                          }
                   }

                   public function getData() {
 
                       return $this->data;
                   }              
     }//end class

     abstract class DataSource {

          abstract function getCount();

          abstract function getName($row);              

          abstract function getValue($row);
     }

     class GraphAdapter extends DataSource{

           public $arr = array();

                  public function __construct($data) {

                         $this->arr = $data->getData();
                  }

                  public function getName($num) {

                         return $this->arr[$num]->name; 
                  }

                  public function getValue($num) {

                         return $this->arr[$num]->value;
                  }

                  public function getCount() {

                         return count($this->arr);
                  }

                  public function getSumValues() {

                         $s = 0;

                         $n = $this->getCount();

                         for($i=0;$i<$n;$i++) {

                             $s += $this->arr[$i]->value;
                         }  

                      return $s;
                  }

     }//end class


     class GraphRender {

              private $adapter;

              private $gmin;

              private $gmax;
 
              private $h;

              private $w;

              private $caption;

                      public function __construct($adapter,$width=10,$height,$caption='noname caption barchart') {

                              $this->adapter = $adapter; 

                              $this->h = $height;

                              $this->w = $width;

                              $this->caption = $caption;
                      }            

                      private function getMinMax() {

                              $n = $this->adapter->getCount();

                              $this->gmin = 9999;

                              $this->gmax = -9999;

                              for($i=0;$i<$n;$i++) {

                                     if($this->adapter->getValue($i) > $this->gmax) {$this->gmax = $this->adapter->getValue($i);}  

                                     if($this->adapter->getValue($i) < $this->gmin) {$this->gmin = $this->adapter->getValue($i);}  
                              } 
                      }

                      public function render() {

                              $this->getMinMax();

                              $ratio = 200 / ($this->gmax - $this->gmin);

                              $n = $this->adapter->getCount();

                              $sum = $this->adapter->getSumValues();

                              $output = '<table class="barchart" cellspacing="0" cellpadding="0" summary="summary">'.

                                        '<caption align="top">Top site visitors<br /><br /></caption>'.

                                        '<tr><th scope="col"><span class="auraltext">Country</span></th>'.

                                        '<th scope="col"><span class="auraltext">Millions of US dollars per million people</span></th></tr>';

                              for($i=0;$i<$n;$i++) {

                                  $name = $this->adapter->getName($i);

                                  $value = $this->adapter->getValue($i);

                                  ini_set("precision", "4");

                                  $percent = ($value / $sum) * 100;

                                  $v = ($value - $this->gmin ) * $ratio;

                                  if($i == 0) {

                                         $output .= '<tr><td class="first">'.$name.'</td><td class="value first"><img src="bar.png" alt="" width="'.$v.'" height="16" />'.$percent.'%</td></tr>';

                                  } else if($i == $n-1) {

                                         $output .= '<tr><td>'.$name.'</td><td class="value last"><img src="bar.png" alt="" width="'.$v.'" height="16" />'.$percent.'%</td></tr>';

                                  } else {
 
                                         $output .= '<tr><td>'.$name.'</td><td class="value"><img src="bar.png" alt="" width="'.$v.'" height="16" />'.$percent.'%</td></tr>';
                                  }

                              }//end for

                                  $output .= '</table>';

                         return($output);
                      }


                      public function render2() {

                              $n = $this->adapter->getCount();

                              $sum = $this->adapter->getSumValues();

                              $height = 20;

                              $output = '<table class="barchart" cellspacing="0" cellpadding="0" summary="summary">'.

                                        '<caption align="top">Top site visitors<br /><br /></caption>'.

                                        '<tr><th scope="col"><span class="auraltext">Country</span></th>'.

                                        '<th scope="col"><span class="auraltext">Millions of US dollars per million people</span></th></tr>';

                              for($i=0;$i<$n;$i++) {

                                  $name = $this->adapter->getName($i);

                                  $value = $this->adapter->getValue($i);

                                  ini_set("precision", "4");

                                  $percent = ($value / $sum) * 100;

                                  $width = $percent*9;

                                  if($i == 0) {

                                         $output .= '<tr><td class="first">'.$name.'</td><td class="value first"><img src="bar.png" alt="" width="'.$width.'px" height="'.$height.'px" />'.$percent.'%</td></tr>';

                                  } else if($i == $n-1) {

                                         $output .= '<tr><td>'.$name.'</td><td class="value last"><img src="bar.png" alt="" width="'.$width.'px" height="'.$height.'px" />'.$percent.'%</td></tr>';

                                  } else {
 
                                         $output .= '<tr><td>'.$name.'</td><td class="value"><img src="bar.png" alt="" width="'.$width.'px" height="'.$height.'px" />'.$percent.'%</td></tr>';
                                  }

                              }//end for

                                  $output .= '</table>';

                         return($output);
                      }


                      public function render3() {

                              $n = $this->adapter->getCount();

                              $sum = $this->adapter->getSumValues();

                              $height = $this->h;

                              $output = '<table class="barchart" cellspacing="0" cellpadding="0" summary="summary">'.

                                        '<caption align="top">'.$this->caption.'<br /><br /></caption>'.

                                        '<tr><th scope="col"><span class="auraltext">Country</span></th>'.

                                        '<th scope="col"><span class="auraltext">Millions of US dollars per million people</span></th></tr>';

                              for($i=0;$i<$n;$i++) {

                                  $name = $this->adapter->getName($i);

                                  $value = $this->adapter->getValue($i);

                                  ini_set("precision", "4");

                                  $percent = ($value / $sum) * 100;

                                  $width = $percent*$this->w;

                                  if($i == 0) {

                                         $output .= '<tr><td class="first">'.$name.'</td><td class="value first"><img src="bar.png" alt="" width="'.$width.'px" height="'.$height.'px" />'.$value.'</td></tr>';

                                  } else if($i == $n-1) {

                                         $output .= '<tr><td>'.$name.'</td><td class="value last"><img src="bar.png" alt="" width="'.$width.'px" height="'.$height.'px" />'.$value.'</td></tr>';

                                  } else {
 
                                         $output .= '<tr><td>'.$name.'</td><td class="value"><img src="bar.png" alt="" width="'.$width.'px" height="'.$height.'px" />'.$value.'</td></tr>';
                                  }

                              }//end for

                                  $output .= '</table>';

                         return($output);
                      }



     }//end class
?>