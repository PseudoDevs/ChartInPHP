<?php

namespace iamjohndev;

class ChartinPHP
{
    private $chartType;
    private $chartData;
    private $chartOptions;
    private $canvasId;

    public function __construct($chartType, $chartData, $chartOptions = [], $canvasId = null)
    {
        $this->chartType = $chartType;
        $this->chartData = $chartData;
        $this->chartOptions = $chartOptions;
        $this->canvasId = $canvasId;
    }

    public function render()
    {
        $this->validateChartType();
        $this->sanitizeChartData();
        $this->sanitizeChartOptions();

        if (empty($this->canvasId)) {
            $this->canvasId = 'chart_' . uniqid(); // Generate unique ID for canvas element
        }

        $html = '<canvas id="' . $this->canvasId . '" width="400" height="400"></canvas>';
        $html .= '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        $html .= '<script>';
        $html .= 'var ctx = document.getElementById("' . $this->canvasId . '").getContext("2d");';
        $html .= 'var chart = new Chart(ctx, {';
        $html .= 'type: "' . $this->chartType . '",';
        $html .= 'data: ' . json_encode($this->chartData) . ',';
        $html .= 'options: ' . json_encode($this->chartOptions) . ',';
        $html .= '});';
        $html .= '</script>';

        return $html;
    }

    private function validateChartType()
    {
        $validChartTypes = ['bar', 'line', 'pie', 'doughnut', 'polarArea', 'radar'];
        if (!in_array($this->chartType, $validChartTypes)) {
            throw new \InvalidArgumentException('Invalid chart type');
        }
    }

    private function sanitizeChartData()
    {
        // Sanitize chart data to prevent SQL injection and XSS attacks
        // You may need to customize this based on the structure of your chart data
        // Example: Assuming the chartData is an array of data points, we can use array_map() function to sanitize each data point
        $this->chartData = array_map('htmlspecialchars', $this->chartData);
    }

    private function sanitizeChartOptions()
    {
        // Sanitize chart options to prevent SQL injection and XSS attacks
        // You may need to customize this based on the structure of your chart options
        // Example: Assuming the chartOptions is an associative array, we can use array_map() function to sanitize each option value
        $this->chartOptions = array_map('htmlspecialchars', $this->chartOptions);
    }
}
