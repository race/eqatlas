<?php
class Page {
  public $name;
  public $title = '';
  public $meta = '<meta name="viewport" content="width=device-width, initial-scale=1.0">';

  public $keywords = array(
    'everquest',
    'maps',
    'atlas',
    'travel guide',
    'monsters',
    'NPC',
    'guide',
    'eq',
    'project1999',
    'p99'
  );

  public function title() {
    return $this->title;
  }

  public function keywords() {
    $keywords = $this->keywords;
    if (isset($this->name)) {
      $keywords = array_merge($keywords, array(
        $this->name
      ));
    }

    return implode(', ', $keywords);
  }

}
?>
