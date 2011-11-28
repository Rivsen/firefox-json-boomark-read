<?php
if( php_sapi_name() != 'cli' ){
        $enter = '<br />';
        $space = '&nbsp;&nbsp;&nbsp;&nbsp;';
}else{
        $enter = "\n";
        $space = '    ';
}

//$file = file_get_contents('bookmarks-2011-11-27.json');
$file = file_get_contents('bookmarks-2011-11-28.json');
$bookmark = json_decode($file);

/*
foreach($bookmark->children as $child){
    echo $enter . $child->title;
    echo $enter . $child->root;
}
 */

echo read($bookmark);

function read( $children, $node = 1, $result = '' ) {
    $space = '';
    for( $i=1; $i <= $node; $i++ ){
        $space .= $GLOBALS['space'];
    }

    if( gettype($children) ){
        if( $result == '' )
            $result .= "** This is a firefox json bookmark export file.**" . $GLOBALS['enter'] . $GLOBALS['enter'];

        //if( @$children->children && $node <= 3 ){
        if( @$children->children ){
                $node++;
                $result .= ($space . $children->title . '(' . $children->id . ')');
                $result .= $GLOBALS['enter'];
                foreach( $children->children as $key => $child ){
                        $result = read( $child, $node, $result );
                        if( $key == (count($children->children)-1) ){
                                $result .= $GLOBALS['enter'];
                        }
                }
        }else{
                //$result .= ($space . $children->title . '(' . $children->id . ')');
                //$result .= ' -> ' . @$children->uri . $GLOBALS['enter'];
                $result .= echoresult( ($children->title . '(' . $children->id . ')'), @$children->uri, $space );
                $node--;
        }
    }else{
        $result .= "This is not a json firefox bookmark file" . $GLOBALS['enter'] . $GLOBALS['enter'];
    }
    return $result;
}

function echoresult( $title, $href, $space ){
        if( php_sapi_name() != 'cli' ){
                if( $href ){
                        $link = $space . '<a href="' . $href . '" target="_blank">' . $title . '</a>' . $GLOBALS['enter'];
                }else{
                        $link = $space . '<a href="javascript:void(0)" style="color:#ccc">' . $title . '</a>' . $GLOBALS['enter'];
                }
        }else{
                $link = $space . $title . ' -> ' . $href . $GLOBALS['enter'];
        }
        return $link;
}

echo $GLOBALS['enter']; ?>
