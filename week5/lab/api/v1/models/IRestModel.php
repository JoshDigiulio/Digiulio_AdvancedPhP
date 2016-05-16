<?php
//Page Done[x]
//Update the interface for your REST API model that will have a set of standard
//functions.  (getAll, get, post, put, delete):
//Make sure it has the correct parameters needed:
interface IRestModel  
{
    function getAll();
    function get($id);
    function post($serverData);
    function put($serverData, $id);
    function delete($id);
}
