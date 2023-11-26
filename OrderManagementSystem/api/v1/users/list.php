<?php
namespace TaurusOmsApi
{
    use ReflectionClass;
    use Exception;
    use TaurusOmsApi\ErrorHandler;
    use TaurusOmsApi\EntityFramework;
    
    header('Content-Type: application/json; charset=utf-8');

    $ef;
    $output = [];
    $output['data'] = '';
    $output['response'] = 'error';
    try
    {
        $ef = new EntityFramework();
        $output['data'] = $ef->GetEntityList(new ReflectionClass("User"), 0);
        $output['response'] = 'ok';
    }
    catch(Exception $ex)
    {
        $output['data'] = ErrorHandler::getError($ex);
    }
    finally
    {
        echo json_encode($output, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }
}
?>