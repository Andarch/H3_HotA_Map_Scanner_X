<?php

function generateHeader($headerInfo = null) {
    if(isset($headerInfo)) {
        $name = $headerInfo['mapname'];
        $file = $headerInfo['mapfile'];
        $version = $headerInfo['version'];
        $date = $headerInfo['filetime'];
        $size = $headerInfo['mapsize'];
        $layers = $headerInfo['levels'];
        $description = preg_replace('/(<br\s*\/?>\s*)+/', '<br>', $headerInfo['mapdesc']);
    }
    else {
        $name = EMPTY_DATA;
        $file = EMPTY_DATA;
        $version = EMPTY_DATA;
        $date = EMPTY_DATA;
        $size = EMPTY_DATA;
        $layers = EMPTY_DATA;
        $description = EMPTY_DATA;
    }
    ?>

    <div class="site-header">
        <table>
            <tbody>
                <tr>
                    <td>Name</td>
                    <td><?php echo $name; ?></td>
                    <td>Version</td>
                    <td><?php echo $version; ?></td>
                    <td>Size</td>
                    <td class="ac"><?php echo $size; ?></td>
                    <td rowspan="2">Description</td>
                    <td rowspan="2"><?php echo $description; ?></td>
                </tr>
                <tr>
                    <td>File</td>
                    <td><?php echo $file; ?></td>
                    <td>Date</td>
                    <td><?php echo $date; ?></td>
                    <td>Layers</td>
                    <td class="ac"><?php echo $layers; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php
}