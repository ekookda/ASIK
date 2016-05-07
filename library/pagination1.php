<?php
/*************************************************************************
php easy :: pagination scripts set - Version One
==========================================================================
Author:      php easy code, www.phpeasycode.com
Web Site:    http://www.phpeasycode.com
Contact:     webmaster@phpeasycode.com
*************************************************************************/
function paginate_one($reload, $page, $tpages) {

	$firstlabel = "<span class='glyphicon glyphicon-fast-backward'></span>";
	$prevlabel  = "<span class='glyphicon glyphicon-triangle-left'></span>";
	$nextlabel  = "<span class='glyphicon glyphicon-triangle-right'></span>";
	$lastlabel  = "<span class='glyphicon glyphicon-fast-forward'></span>";

	$out = "<div class=\"pagination\">\n";

	// first
	if($page>1) {
		$out.= "<a href=\"" . $reload . "\">" . $firstlabel . "</a>\n";
	}
	else {
		$out.= "<span>" . $firstlabel . "</span>\n";
	}

	// previous
	if($page==1) {
		$out.= "<span>" . $prevlabel . "</span>\n";
	}
	elseif($page==2) {
		$out.= "<a href=\"" . $reload . "\">" . $prevlabel . "</a>\n";
	}
	else {
		$out.= "<a href=\"" . $reload . "&amp;page=" . ($page-1) . "\">" . $prevlabel . "</a>\n";
	}

	// current
	$out.= "<span class=\"current\">Halaman " . $page . " dari " . $tpages . "</span>\n";

	// next
	if($page<$tpages) {
		$out.= "<a href=\"" . $reload . "&amp;page=" .($page+1) . "\">" . $nextlabel . "</a>\n";
	}
	else {
		$out.= "<span>" . $nextlabel . "</span>\n";
	}

	// last
	if($page<$tpages) {
		$out.= "<a href=\"" . $reload . "&amp;page=" . $tpages . "\">" . $lastlabel . "</a>\n";
	}
	else {
		$out.= "<span>" . $lastlabel . "</span>\n";
	}

	$out.= "</div>";

	return $out;
}
?>
