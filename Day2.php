<?php

//创建节点对象
class Node
{
    public $data;//节点数据
    public $next;//下一节点

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }
}

class SingleLinkedList
{
    protected $header;//头结点

    function __construct($data)
    {
        $this->header = new Node($data);
    }

    //查找节点
    public function find($item)
    {
        //获取当前节点
        $current = $this->header;
        while ($current->data != $item) {
            $current = $current->next;
        }
        return $current;
    }

    //在节点后 插入一个新的节点
    //$item 节点
    //$new  新节点
    public function insert($item, $new)
    {
        //创建新的节点
        $newNode = new Node($new);

        //查找上一个节点
        $current = $this->find($item);

        //将上一个节点值的下一个节点  指向新节点的 下一个节点  为null 下一个节点值为null
        $newNode->next = $current->next;

        //将上一个节点的 的下一个节点值 = 新的创建的节点
        $current->next = $newNode;
        return true;
    }

    //更新节点
    //$old 旧节点
    //$new 新节点
    public function update($old, $new)
    {
        //获取当前链表
        $current = $this->header;
        if ($current->next == null) {
            return '空链表';
        }

        //循环查询链表值
        while ($current->next != null) {
            //判断传过来的节点值 与 链表中的节点值 对比
            if ($current->data == $old) {
                //跳出循环
                break;
            }
            //循环到下一个节点
            $current = $current->next;
        }
        //替换当前的的节点值
        return $current->data = $new;
    }

    //查找 待删除 节点 的前一个节点 和 后面的所有节点
    //$item 待删除的节点
    public function findPrevious($item)
    {
        //获取当前节点对象
        $current = $this->header;
        //链表不能为空       链表的第一个值不能为删除的节点
        while ($current->next != null && $current->next->data != $item) {
            $current = $current->next;
        }

        //待删除 节点 的前一个节点 和 后面的所有节点
        return $current;
    }

    //删除指定节点对象
    public function delete($item)
    {
        $previous = $this->findPrevious($item);
        if ($previous->next != null) {
            $previous->next = $previous->next->next;
        }
    }

    //删除整合
    public function remove($tiem)
    {
        //获取当前节点
        $current = $this->header;
        //获取当前需要删除的节点 的 上一个节点 和 之后的所有节点
        while ($current->next != null && $current->next->data != $tiem) {
            //获取当前需要删除的节点 的 上一个节点 和 之后的所有节点
            $current = $current->next;
        }
        //获取到当前 删除节点的下一个 节点值 是否为空
        if ($current->next != null) {
            //将当前待删除节点 的 下一个节点 赋值给 待删除的节点 覆盖掉
            $current->next = $current->next->next;
        }
        return true;
    }

    //向链表的头部插入节点
    public function firstAdd($item)
    {
        $current = $this->header;
        if ($current->next != null && $current->data != $item) {
            $newNode = new Node($item);
            $newNode->next = $current->next;
            $current->next = $newNode;
        }
        return true;
    }

    public function display()
    {
        $current = $this->header;
        if ($current->next == null) {
            echo "链表为空！";
            return;
        }

        $array = [];
        while ($current->next != null) {
            array_push($array,$current->next->data);
            $current = $current->next;
        }
        return $array;
    }
}

$linkedList0 = new SingleLinkedList('header');
$linkedList0->insert('header',1);
$linkedList0->insert(1,2);
$linkedList0->insert(2,3);

$linkedList1 = new SingleLinkedList('header');
$linkedList1->insert('header',1);
$linkedList1->insert(1,2);
$linkedList1->insert(2,3);

$result0 = $linkedList0->display();
$result1 = $linkedList1->display();
var_dump($result0);
var_dump($result1);