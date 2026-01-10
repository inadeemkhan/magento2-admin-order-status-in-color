<?php
declare(strict_types=1);

namespace DevScripts\OrderStatusColor\Setup\Patch\Data;

use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use Magento\Framework\Serialize\Serializer\Json;

/**
 * Class AddDefaultStatusColors
 *
 * Adds default status colors for the Order Status Color module
 */
class AddDefaultStatusColors implements DataPatchInterface
{
    private WriterInterface $writer;
    private Json $serializer;

    /**
     * Constructor
     *
     * @param WriterInterface $writer
     * @param Json $serializer
     */
    public function __construct(
        WriterInterface $writer,
        Json $serializer
    ) {
        $this->writer = $writer;
        $this->serializer = $serializer;
    }

    /**
     * Apply the patch: add default status colors
     *
     * @return void
     */
    public function apply(): void
    {
        $defaults = [
            'row_1' => [
                'status'       => 'complete',
                'custom_label' => 'Finished',
                'bg_color'     => '#d4edda',
                'text_color'   => '#155724',
            ],
            'row_2' => [
                'status'       => 'pending',
                'custom_label' => 'Pending Review',
                'bg_color'     => '#fff3cd',
                'text_color'   => '#856404',
            ],
            'row_3' => [
                'status'       => 'processing',
                'custom_label' => 'In Progress',
                'bg_color'     => '#cce5ff',
                'text_color'   => '#004085',
            ],
            'row_4' => [
                'status'       => 'canceled',
                'custom_label' => 'Closed',
                'bg_color'     => '#f8d7da',
                'text_color'   => '#721c24',
            ],
        ];

        $this->writer->save(
            'order_status_color/status_colors/colors',
            $this->serializer->serialize($defaults)
        );
    }

    /**
     * Get dependencies
     *
     * @return array
     */
    public static function getDependencies(): array
    {
        return [];
    }

    /**
     * Get aliases
     *
     * @return array
     */
    public function getAliases(): array
    {
        return [];
    }
}