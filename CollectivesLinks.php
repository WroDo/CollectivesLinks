<?php
/**
 * This converts Nextcloud Collectives Links for use in Pico 
 *
 * Source: https://github.com/WroDo/CollectivesLinks
 *
 * SPDX-License-Identifier: GPL V3
 * License-Filename: LICENSE
 */

/**
 * @author  Heiko Kretschmer
 * @link    https://github.com/WroDo/CollectivesLinks
 * @license https://www.gnu.org/licenses/gpl-3.0.txt
 * @version 0.2
 */
class CollectivesLinks extends AbstractPicoPlugin
{
    /**
     * API version used by this plugin
     *
     * @var int
     */
    const API_VERSION = 3;
 //   private $gFileLog="plugins/CollectivesLinks/.log.log";


   /**
     * Triggered after Pico has prepared the raw file contents for parsing
     *
     * @see DummyPlugin::onContentParsing()
     * @see Pico::parseFileContent()
     * @see DummyPlugin::onContentParsed()
     *
     * @param string &$markdown Markdown contents of the requested page
     */
    public function onContentPrepared(&$aMarkdown)
    {
           if (isset($this->gFileLog)) file_put_contents($this->gFileLog, $aMarkdown, FILE_APPEND | LOCK_EX);

// Nice to know: https://regex101.com/
//
// Collectives:
// [Test](Known%20Issues%20%26%20ToDo.md?fileId=155813)
// Pico:
// [Test](Known%20Issues%20%26%20ToDo)


                                $aMarkdown=preg_replace('/(\[.*\])(\(.*)(\.md)(\?.*\))/', '${1}${2})', $aMarkdown);

           if (isset($this->gFileLog)) file_put_contents($this->gFileLog, $aMarkdown, FILE_APPEND | LOCK_EX);
    }



} // end class
