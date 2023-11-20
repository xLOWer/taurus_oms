<?php
namespace TaurusOmsApi
{
    use ReflectionClass;
    use Exception;
    use TaurusOmsApi\Core\ErrorHandler;
    use TaurusOmsApi\Core\EntityFramework\EntityFramework;
    
    header('Content-Type: application/json; charset=utf-8');

    $entityFramework;
    $output = [];
    $output['data'] = '';
    $output['response'] = 'ok';
    try
    {
        $entityFramework = new TaurusOmsApi\Core\EntityFramework EntityFramework();
        $output['data'] = $entityFramework->GetEntityList(new ReflectionClass("User"), 0);
    }
    catch(Exception $ex)
    {
        $output['response'] = 'error';
        $output['data'] = ErrorHandler::getError($ex);
    }
    finally
    {
        echo json_encode($output, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }
}
?>