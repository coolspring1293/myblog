<?php
/**
 * Tag cloud demo based on word frequency
 * @author: unknown
 * @since: 2007-02-27
 */
// Store frequency of words in an array
$freqData = array();
// Random words
$lorem = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
Phasellus vestibulum ullamcorper tortor. Aenean quis lacus quis neque
adipiscing ultricies. Pellentesque tincidunt ligula vitae nibh ornare
pharetra. Proin dignissim tortor. Donec et ipsum nec tellus gravida
tempor. Aliquam ullamcorper purus vel felis. Praesent faucibus.
Curabitur porta. Nulla in lorem quis mi lacinia fringilla. Integer
adipiscing mi quis felis. Pellentesque habitant morbi tristique senectus
et netus et malesuada fames ac turpis egestas. Quisque sagittis ante in
arcu. Sed libero enim, venenatis sit amet, vestibulum at, porttitor id,
neque. Vestibulum ornare semper erat. Sed tincidunt nibh et massa. Cras
sed diam. Quisque blandit enim.
Sed nonummy. Aenean mollis turpis quis enim. Nam massa nulla, varius
molestie, aliquet et, feugiat eget, nisi. Sed mollis, leo ut pretium
placerat, nibh turpis egestas ipsum, sed aliquam neque enim in risus.
Nullam nisl. Sed tincidunt leo quis tellus. Mauris non lorem. Aenean
tristique justo at arcu. Fusce et lorem. Nam sodales. Mauris condimentum
diam. Nam commodo. Cum sociis natoque penatibus et magnis dis parturient
montes, nascetur ridiculus mus. Cras ac risus. Proin et dolor laoreet mi
gravida sodales. Duis bibendum, ipsum posuere egestas posuere, dui lacus
feugiat turpis, id tincidunt urna est sit amet est. Cras eu sem.
";
// Get individual words and build a frequency table
foreach( str_word_count( $lorem, 1 ) as $word )
{
 // For each word found in the frequency table, 
 //increment its value by one
 array_key_exists($word,$freqData)?$freqData[$word]++:$freqData[$word]=0;
}
// ==============================================================
// = Function to actually generate the cloud from provided data =
// ==============================================================
function getCloud($data = array(), $minFontSize = 12, $maxFontSize = 30)
{
 $minimumCount = min( array_values( $data ) );
 $maximumCount = max( array_values( $data ) );
 $spread = $maximumCount - $minimumCount;
 $cloudHTML = '';
 $cloudTags = array();
 $spread == 0 && $spread = 1;
 foreach( $data as $tag => $count )
 {
 $size = $minFontSize + ( $count - $minimumCount )
 * ( $maxFontSize - $minFontSize ) / $spread;
 $cloudTags[] = '<a style="font-size: ' . floor( $size ) . 'px'
 . '" class="tag_cloud" href="http://www.google.com/search?q='
 . $tag
 . '" title="\'' . $tag . '\' returned a count of ' . $count
 . '">'
 . htmlspecialchars( stripslashes( $tag ) ) . '</a>';
 }
 return join( "\n", $cloudTags ) . "\n";
} 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <title>Tag Cloud Demo</title>
 <style type="text/css" media="screen">
 /*<![CDATA[*/
 .tag_cloud { padding: 3px; text-decoration: none; }
 .tag_cloud:link { color: #81d601; }
 .tag_cloud:visited { color: #019c05; }
 .tag_cloud:hover { color: #ffffff; background: #69da03; }
 .tag_cloud:active { color: #ffffff; background: #ACFC65; }
 /*]]>*/
 </style>
</head>
<body>
 <h1>Sample Tag Cloud</h1>
 <div id="wrapper">
 <?php echo getCloud( $freqData ) ?>
 </div>
</body>
</html>