<?php
namespace Topxia\WebBundle\Controller;

class TagController extends BaseController
{
    /**
     * 获取所有标签，以JSONM的方式返回数据
     * 
     * @return JSONM Response
     */
    public function allAction()
    {
        $data = array();

        $tags = $this->getTagService()->findAllTags(0, 100);
        foreach ($tags as $tag) {
            $data[] = array('id' => $tag['id'],  'name' => $tag['name'] );
        }
        return $this->createJsonmResponse($data);
    }

    protected function getTagService()
    {
        return $this->getServiceKernel()->createService('Taxonomy.TagService');
    }

}