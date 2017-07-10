<?php namespace App\Helpers;

class EloquentHelper
{

    public function allInOne($query, $params = array())
    {
        if(!empty($params['filter']) && is_array($params['filter'])){
            foreach($params['filter'] as $column => $row){
                if(!empty($column) && !empty($row["value"]) && is_array($row)){
                    $operator = config("setup.oprators.".$row["oprator"], $row["oprator"]);
                    $column = (!empty($row["alias"])) ? $row["alias"] : $column;
                    $query->where($column, $operator, $row["value"]);
                }
            }
        }

        if(!empty($params['sort']) && is_array($params['sort'])){
            foreach($params['sort'] as $column => $direction){
                $query->orderBy($column, $direction);
            }
        }

        if(!empty($params['paginate']) && $params['paginate']){
            return $query->paginate(config("setup.par_page", 10));
        }else{
            if(!empty($params['single']) && $params['single']){
                return $query->first();
            }else{
                return $query->get();
            }
        }

        return $query->get();
    }

}