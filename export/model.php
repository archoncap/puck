<?php


namespace export;

/*
 * this->where()
 *
 *
 * */
class model
{
    protected $db;
    protected $field;
    protected $table;
    public function __construct()
    {
        $this->db = \MysqliDb::getInstance();
    }
    public function __call($method,$arg){
        $ret=$this;
        if(method_exists ($this->db, $method)){
            $ret=call_user_func_array(array($this->db,$method),$arg);
        }
        return $ret==$this->db? $this: $ret;
    }
    public function __get($name){
        if(property_exists($this->db, $name)){
            return $this->db->$name;
        }
        throw new MemberAccessException('model Property ' . $name . ' not exists');
    }
    public function find(){
        return $this->db->getOne($this->table,$this->field);
    }
    public function select(){
        return $this->db->get($this->table,null,$this->field);
    }
    public function count(){
        return $this->db->count;
    }
    public function table($table){
        $this->table=$table;
        return $this;
    }
    public function add($data){
        return $this->db->insert($this->table,$data);
    }
    public function update($data){
        return $this->db->update($this->table,$data);
    }
    public function field($field){
        $this->field=$field;
        return $this;
    }
    public function delete(){
        return $this->db->delete($this->table);
    }
    public function page($page,$pageLimit='10'){
        $this->db->pageLimit=$pageLimit;
        $info= $this->db->paginate($this->table,$page);
        return $info;
    }
}