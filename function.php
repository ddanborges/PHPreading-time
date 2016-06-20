function readingTime($html){

  //counting article images
  libxml_use_internal_errors(true);
  $dom = new \DOMDocument();
  $dom->preserveWhiteSpace = false;
  $dom->loadHTML($html);
  $xpath = new \DOMXPath($dom);
  $xpath_results = $xpath->query("//img");
  $qty_img = $xpath_results->length; // number of images in Article
  
  $words = str_word_count(strip_tags($html));
  $wordsPerSecond = 275 / 60;
  $secondsToRead = $words / $wordsPerSecond;
  $secondsToRead += $qty_img * 12;
  $minToRead = floor($secondsToRead / 60);
  
  if($minToRead == 0){
      return '1 min read';
  }
  return $minToRead . ' min read';
}
