<?php

//============================================================================
// trial ezPdf template.
//
// the template code will effectively be executed within an ezPdf function
// there will be two arrays which should be set, and this is intended way for
// the template to receive information, those arrays are:
// data -> will contain the data
// options -> will contain the various options which control the appearance
// note that the format of these two is completely arbitrary, and will be
// different for each template.
//
// it will be possible to have function within a template, but they will end
// up in global scope, so should be named accordingly, I suggest prefixing them
// all with 'ezPdfTMPL_', though that might be more of a mouthful than most 
// people want. (future versions may parse the function names to unique values
// at run time).
//============================================================================

// this is a template to produce an origami plan for an envelope to hold a cd
// it can include the title, and descriptions etc.
// the data array will contain two items:
// 'title'
// 'description'

// nothing is expected in the options array.

// find the size that the page has been set to:

$pw = $this->ez['pageWidth'];
$ph = $this->ez['pageHeight'];
// note that the margins are being ignored for this template.

// cd diameter is 120mm, allow an extra 3 mm each side for the fold, thickness, slop etc

$diam = 120/25.4*72;  // convert to points
$slop = 3*2/25.4*72;

// draw the verticals;

$this->setLineStyle(0.5,'','',array(10));
$this->setStrokeColor(0.5,0.5,0.5);

$fh=100;

$x0 = ($pw-$diam-$slop)/2;
$x1 = $x0+$diam+$slop;
$this->line($x0,0,$x0,$ph-$fh);
$this->line($x1,0,$x1,$ph-$fh);

$this->setLineStyle(0.5,'','',array(2));
$this->line($x0,$ph-$fh,$x0,$ph);
$this->line($x1,$ph-$fh,$x1,$ph);

// make the flap 200 points big, so put a line across
$y=$ph-200;

$this->line(0,$y,$x0,$y);
$this->line($x1,$y,$pw,$y);
$this->setLineStyle(0.5,'','',array(10));
$this->line($x0,$y,$x1,$y);

// and the spine 10 points
$y-=10;
$this->setLineStyle(0.5,'','',array(2));
$this->line(0,$y,$x0,$y);
$this->line($x1,$y,$pw,$y);
$this->setLineStyle(0.5,'','',array(10));
$this->line($x0,$y,$x1,$y);

$textPos = $y;

// allow the same cd slop in the vertical direction
$y-= ($diam+$slop);
$this->setLineStyle(0.5,'','',array(2));
$this->line(0,$y,$x0,$y);
$this->line($x1,$y,$pw,$y);
$this->setLineStyle(0.5,'','',array(10));
$this->line($x0,$y,$x1,$y);

// add in the markers for the flap folds
$this->line($x0,$ph-$fh,$x0+$fh,$ph);
$this->line($x0,$ph-$fh,$x0-$fh,$ph);
$this->line($x1,$ph-$fh,$x1+$fh,$ph);
$this->line($x1,$ph-$fh,$x1-$fh,$ph);

// and also the bottom folds
$this->line($x0,$y,0,$y+$x0);
$this->line($x1,$y,$pw,$y-$x1+$pw);
$this->setLineStyle(0.5,'','',array(2));
$this->line($x0,$y,0,$y-$x0);
$this->line($x1,$y,$pw,$y+$x1-$pw);

// then add the title and description text
$this->y = $textPos;
if (isset($data['title'])){
  if (is_array($data['title'])){
    $title = implode("\n",$data['title']);
  } else {
    $title=$data['title'];
  }
  $this->ezSetDy(-10);
  $this->ez['leftMargin']=0;
  $this->ez['rightMargin']=0;
  $this->ezText($title,16,array('left'=>$x0+10,'right'=>($pw-$x1+10),'justification'=>'center'));
}

if (isset($data['description'])){
  if (is_array($data['description'])){
    $desc = implode("\n",$data['description']);
  } else {
    $desc=$data['description'];
  }
  $this->ezSetDy(-10);
  $this->ez['leftMargin']=0;
  $this->ez['rightMargin']=0;
  $this->ezText($desc,10,array('left'=>$x0+10,'right'=>($pw-$x1+10),'justification'=>'left'));
}


?>