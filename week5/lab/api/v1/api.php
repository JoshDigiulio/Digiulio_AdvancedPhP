<?php

include_once './bootstrap.php';

/*
 * The Rest server is sort of like the page is hosting the API
 * When a user calls the page (By url(HTTP), CURL, JavaScript etc.), the server(this Page) will handle the request.
 */
$restServer = new RestServer();

try 
{

    $restServer->setStatus(200);

    $resource = $restServer->getResource();
    $verb = $restServer->getVerb();
    $id = $restServer->getId();
    $serverData = $restServer->getServerData();

    /* 
     * You can add resoruces that will be handled by the server 
     * 
     * There are clever ways to use advanced variables to sort of
     * generalize the code below. That would also require that all
     * resoruces follow the same standard. Interfaces can ensure that.
     * 
     * But in this example we will just code it out.
     * 
     */

    if ('corp' === $resource) 
    {
        $resourceData = new CorporationResource();

        if ('GET' === $verb) 
        {

            if (NULL === $id) 
            {
                $restServer->setData($resourceData->getAll());
            } 
            else 
            {
                $restServer->setData($resourceData->get($id));
            }
        }
        
        if ('POST' === $verb) 
        {
            if ($resourceData->post($serverData)) 
            {
                $restServer->setMessage('The corporation has been added.');
                $restServer->setStatus(201);
            } 
            else 
            {
                throw new Exception('The corporation could not be added.');
            }
        }

        if ('PUT' === $verb) 
        {
            if (NULL === $id) 
            {
                throw new InvalidArgumentException('The corp. ID ' . $id . ' was unable to be found.');
            } 
            else 
            {
                if ($resourceData->put($serverData, $id)) 
                {
                    $restServer->setMessage('The corp. was updated!');
                    $restServer->setStatus(201);
                } 
                else 
                {
                    throw new Exception('The corp. was unable to be updated at this time.');
                }
            }
        }
        
        if ('DELETE' === $verb) 
        {
            if (is_null($id)) 
            {
                throw new InvalidArgumentException('The corp. ID seems to be missing.');
            } 
            else 
            {
                if ($resourceData->delete($id)) 
                {
                    $restServer->setMessage('The corp has been deleted!');
                } 
                else 
                {
                    throw new InvalidArgumentException('The corp. was unable to be deleted at this time ' . $id);
                }
            }
        }     
    } // END if ('corp' === $resource) 
    else 
    {
        throw new InvalidArgumentException($resource . ' Resource Not Found');
        //$response['errors'] = 'Resource Not Found';
        //$status = 404;
    }
}//END Try

/* 400 exeception means user sent something wrong */
catch (InvalidArgumentException $ex) 
{
    $restServer->setStatus(400);
    $restServer->setErrors($ex->getMessage());
}

/* 500 exeception means something is wrong in the program */
catch (Exception $ex) 
{
    $restServer->setStatus(500);
    $restServer->setErrors($ex->getMessage());
}

$restServer->display();
