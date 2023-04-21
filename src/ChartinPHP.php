<?php

namespace iamjohndev;

class ChartinPHP {

    private $chartOptions;
    private $chartData;
    private $chartID;

    public function __construct($chartOptions, $chartData, $chartID = null) {
        $this->chartOptions = json_encode($chartOptions, JSON_NUMERIC_CHECK);
        $this->chartData = json_encode($chartData, JSON_NUMERIC_CHECK);
        $this->chartID = $chartID ?: uniqid('chart_');
    }

    public function renderChart() {
        echo '<div id="' . $this->chartID . '"></div>';
        echo '<script>';
        echo 'var ' . $this->chartID . ' = new ApexCharts(document.getElementById("' . $this->chartID . '"), ' . $this->chartOptions . ');';
        echo $this->chartID . '.render();';
        echo '</script>';
    }

    public function getChartOptions() {
        return $this->chartOptions;
    }

    public function setChartOptions($chartOptions) {
        $this->chartOptions = json_encode($chartOptions, JSON_NUMERIC_CHECK);
    }

    public function getChartData() {
        return $this->chartData;
    }

    public function setChartData($chartData) {
        $this->chartData = json_encode($chartData, JSON_NUMERIC_CHECK);
    }

    public function getChartID() {
        return $this->chartID;
    }

    public function setChartID($chartID) {
        $this->chartID = $chartID;
    }
}

?>
