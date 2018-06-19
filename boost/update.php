<?php

/**
 * @version $Id$
 * @author Matthew McNaney <mcnaney at gmail dot com>
 */
function pagesmith_update(&$content, $currentVersion)
{
    $home_dir = \PHPWS_Boost::getHomeDir();

    switch ($currentVersion) {
        case version_compare($currentVersion, '1.11.0', '<'):
            $content[] = <<<EOF
<pre>
1.11.0 Changes
---------------
+ Canopy version
+ Anchors are no longer "fixed".
</pre>
EOF;
    } // end switch

    return true;
}

function pagesmithUpdateFiles($files, &$content)
{
    $result = \PHPWS_Boost::updateFiles($files, 'pagesmith', true);

    $content[] = ' --- Updated the following files:';
    $content[] = "    " . implode("\n    ", $files);

    if (is_array($result)) {
        $content[] = ' --- Unable to update the following files:';
        $content[] = "    " . implode("\n    ", $result);
    }

    $content[] = '';
}


