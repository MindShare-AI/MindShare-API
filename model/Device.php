<?php
/**
@file     model/Device.php
@author   Florian Lopitaux
@version  0.1
@summary  Model class of the Device SQL table.

-------------------------------------------------------------------------

Copyright (C) 2023 MindShare-AI

Use of this software is governed by the GNU Public License, version 3.

MindShare-API is free RESTFUL API: you can use it under the terms
of the GNU General Public License as published by the
Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

MindShare-API is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with MindShare-API. If not, see <http://www.gnu.org/licenses/>.

This banner notice must not be removed.

-------------------------------------------------------------------------
 */

namespace model;

final class Device {
    // FIELDS
    private string $uuid;


    // CONSTRUCTOR
    /**
     * The constructor to instantiate a Device object.
     *
     * @param string $id The uuid (PRIMARY KEY) of the device.
     */
    public function __construct(string $id) {
        $this->uuid = $id;
    }


    // GETTERS
    /**
     * This method is the getter of the 'uuid' attribute.
     *
     * @return int The identifier of the device.
     */
    public function getUuid(): string {
        return $this->uuid;
    }


    // SETTERS
    /**
     * This method is the setter of the 'uuid' attribute.
     *
     * @param string $uuid The identifier of the device.
     */
    public function setUuid(string $uuid): void {
        $this->uuid = $uuid;
    }


    // METHODS
    /**
     * Returns the model representation of the object.
     *
     * @return string The json string to send.
     */
    public function toJson() : string {
        $object = array(
          'uuid' => $this->uuid
        );

        return json_encode($object);
    }
}
