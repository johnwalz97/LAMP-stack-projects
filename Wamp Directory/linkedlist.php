<?php
class Node {
    public function __construct($val){
        $this->value = $val;
        $this->next = null;
    }
}
class SinglyLinkedList{
    public function __construct(){
        $this->head = null;
        $this->tail = null;
        $this->count = 0;
    }
    public function add($val){
        if ($this->count == 0){
            $node = new Node($val);
            $this->head = $node;
            $this->tail = $node;
            $this->count++;
        }
        else {
            $node = new Node($val);
            $this->tail->next = $node;
            $this->tail = $node;
            $this->count++;
        }
        if($this->find($val) == $val){
            return true;
        }
        //return true if added correctly
    }
    public function remove($value){
        $current = $this->head;
        $previous = $this->head;
        while($current->value != $value){
            if($current->next == null){
                return false;
            }
            else{
                $previous = $current;
                $current = $current->next;
            }
        }
        $previous->next = $current->next;
        return true;
        //return true if correctly removed
        //return false if value was never found
    }
    public function insert($valueAfter, $newValue){
        $current = $this->head;
        $newNode = new Node($newValue);
        while($current->value != $valueAfter){
            if($current->next == null){
                $this->add($newNode);
                return;
            }
            else{
                $current = $current->next;
            }
        }
        $temp = $current->next;
        $current->next = $newNode;
        $newNode->next = $temp;
        return true;
        //return true if successfully inserted after the valueAfter
        //if value is never found add the new value to the end of the linked list
    }
    public function printList(){
        $current = $this->head;
        for($i=1; $i<=$this->count; $i++){
            echo $current->value."<br>";
            $current = $current->next;
        }
        //echo all values in the linked list
    }
    public function find($value){
        $current = $this->head;
        while($current->value != $value){
            if($current->next == null){
                return false;
            }
            else{
                $current = $current->next;
            }
        }
        return $current->value;
        //return node if value is found
        //return false if not found
    }
    public function isEmpty(){
        if($this->count = 0){
            return true;
        }
        else {
            return false;
        }
        //return true if the linked list is empty
        //return false if linked list has nodes
    }
   }
   $list = new SinglyLinkedList();
   $list->add("John");
   $list->add("Todd");
   $list->add("Tim");
   $list->add("Pat");
   $list->add("Joey");
   $list->add("Lewis");
   $list->add("Michael");
   $list->insert("Todd", "Elena");
   $list->printList();
?>