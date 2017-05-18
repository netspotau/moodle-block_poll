<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * poll block rendrer
 *
 * @package    block_poll
 * @copyright  2017 Adam Olley <adam.olley@blackboard.com>
 * @copyright  2017 Blackboard Inc
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
namespace block_poll\output;
defined('MOODLE_INTERNAL') || die;

use plugin_renderer_base;
use renderable;

/**
 * myoverview block renderer
 *
 * @copyright  2017 Adam Olley <adam.olley@blackboard.com>
 * @copyright  2017 Blackboard Inc
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class renderer extends plugin_renderer_base {

    /**
     * Return the main content for the block overview.
     *
     * @param managepolls $tab The managepolls tab renderable
     * @return string HTML string
     */
    public function render_managepolls(managepolls $tab) {
        return $this->render_from_template('block_poll/managepolls', $tab->export_for_template($this));
    }

    public function delete_confirmation_page($poll, $yes, $no) {
        $html = $this->output->header();
        $message = get_string('pollconfirmdelete', 'block_poll', $poll->name);
        $html .= $this->output->confirm($message, $yes, $no);
        $html .= $this->output->footer();
        return $html;
    }
    public function lock_confirmation_page($poll, $yes, $no) {
        $html = $this->output->header();
        $message = get_string('pollconfirmlock', 'block_poll', $poll->name);
        $html .= $this->output->confirm($message, $yes, $no);
        $html .= $this->output->footer();
        return $html;
    }
}