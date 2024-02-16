<?php

namespace ParthShukla\Rbac\Library\Application;

use Illuminate\Support\Facades\Log;
use ParthShukla\Rbac\Models\PermissionGroups;

/**
 * Class PermissionGroupWriter
 *
 * @package ParthShukla\Rbac\Library\Application
 * @since 1.1.0
 * @version 1.1.0
 * @author Parth Shukla <parthshukla@ahex.co.in>
 */
class PermissionGroupWriter
{

    /**
     * PermissionGroups
     *
     * @var PermissionGroups
     */
    protected $permissionGroups;

    //--------------------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @param PermissionGroups $permissionGroups
     */
    public function __construct(PermissionGroups $permissionGroups)
    {
        $this->permissionGroups = $permissionGroups;
    }

    //--------------------------------------------------------------------------------------

    /**
     * Add new permission group
     *
     * @param array $data
     * @return bool
     */
    public function add(array $data)
    {
        try {
            //initialize the model with data to be saved
            $this->permissionGroups->name = $data['name'];
            $this->permissionGroups->description = isset($data['description']) ? $data['description'] : null;

            //save the model
            $this->permissionGroups->save();

            return true;
        } catch (\Exception $e) {
            Log::error('Error while adding new permission group: ' . $e->getMessage());
            return false;
        }
    }
}
//end of class PermissionGroupWriter
//end of file PermissionGroupWriter.php
