<?php
function renderNode($node, $id) {

 $selected = '';
 if($node->id === $id)
 $selected = 'selected';

 if( $node->isLeaf() ) {
     return '<li><a href="'. url('category', $node->slug).'">'.str_repeat('&nbsp;&nbsp;', $node->depth).'' . $node->name . '</a></li>';
   } else {
     $html = '<li>
     <a href="'. url('category', $node->slug).'">'.str_repeat('&nbsp;&nbsp;', $node->depth).'' . $node->name . '</a>
     <b class="toggleArrow" data-toggle="collapse" data-target="#submenu_' . $node->slug . '" aria-expanded="true">
     <i class="fa fa-angle-double-down" aria-hidden="true"></i>
     </b>';

     $html .= '	<ul class="nav collapse" id="submenu_' . $node->slug . '" role="menu">';

     foreach($node->children as $child)
       $html .= renderNode($child, $id);

     $html .= '</ul>';

     $html .= '</li>';
   }

   return $html;
}
?>
<nav id="nav2" role="navigation">
    <ul class="nav nav-stacked">
      @foreach($categories as $Allcategories)
        {!! renderNode($Allcategories, isset($category->parent_id) ? $category->parent_id : null) !!}
      @endforeach
    </ul>
</nav>
