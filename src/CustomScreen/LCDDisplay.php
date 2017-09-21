<?php
/**
 * Created by Marcin.
 * Date: 21.09.2017
 * Time: 11:42
 */

namespace mrcnpdlk\Grandstream\XMLApp\CustomScreen;


class LCDDisplay
{
    /**
     * @var Box
     */
    private $oScreenBox;
    /**
     * @var Box
     */
    private $oSoftKeyBox;
    /**
     * @var Box
     */
    private $oLineKeyBox;
    /**
     * @var Box
     */
    private $oUserBox;
    /**
     * @var int
     */
    private $iSoftKeyCount;

    public function __construct(Box $oBox, int $iSoftKeyAreaHeight = 0, int $iLineKeyAreaWidth = 0, int $iSoftKeyCount = 0)
    {
        $this->oScreenBox    = $oBox;
        $this->oLineKeyBox   = new Box($iLineKeyAreaWidth, $this->oScreenBox->getHeight());
        $this->oSoftKeyBox   = new Box($this->oScreenBox->getWidth(), $iSoftKeyAreaHeight);
        $this->oUserBox      = new Box(
            $this->oScreenBox->getWidth() - $this->oLineKeyBox->getWidth(),
            $this->oScreenBox->getHeight() - $this->oSoftKeyBox->getHeight()
        );
        $this->iSoftKeyCount = $iSoftKeyCount;
    }

    public function getScreenBox()
    {
        return $this->oScreenBox;
    }

    public function getSoftKeyBox()
    {
        return $this->oSoftKeyBox;
    }

    public function getLineKeyBox()
    {
        return $this->oLineKeyBox;
    }

    public function getUserBox()
    {
        return $this->oUserBox;
    }
}
