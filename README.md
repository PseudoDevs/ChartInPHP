# ChartinPHP

ChartinPHP is a PHP library that allows you to render interactive charts using ApexCharts library. It provides an easy-to-use and convenient way to create various types of charts in PHP applications.

## Features

- Supports multiple chart types, including line charts, bar charts, pie charts, and more.
- Provides a simple and intuitive PHP API for generating chart options and data.
- Renders charts using the popular ApexCharts JavaScript library.
- Customizable chart options and data to suit your specific needs.
- Supports rendering multiple charts on the same page with unique IDs.

## Requirements

- PHP 8.0 or Higher
- ApexCharts JavaScript library

## Installation

1. Download or clone the ChartinPHP library to your PHP project.
2. Include the ChartinPHP.php file in your PHP script using the `require_once` statement.
3. Make sure you have the ApexCharts JavaScript library included in your HTML file. You can download it from the ApexCharts website or include it from a CDN.

## Via Composer
`composer require iamjohndev/chartinphp:dev-main`

## Usage

### Creating a Chart

To create a chart, you need to instantiate the ChartinPHP class with the chart options and data. Here's an example:

```php
// Include the ChartinPHP class file
require_once 'ChartinPHP.php';

use iamjohndev\ChartinPHP;

// Chart options
$chartOptions = array(
    'chart' => array(
        'type' => 'line',
        'height' => 350
    ),
    'series' => array(
        array('name' => 'Series 1', 'data' => array(10, 20, 30, 40, 50))
    ),
    'xaxis' => array(
        'categories' => array('January', 'February', 'March', 'April', 'May')
    )
);

// Chart data
$chartData = array(
    array('month' => 'January', 'value' => 10),
    array('month' => 'February', 'value' => 20),
    array('month' => 'March', 'value' => 30),
    array('month' => 'April', 'value' => 40),
    array('month' => 'May', 'value' => 50)
);

// Instantiate the ChartinPHP class
$chart = new ChartinPHP($chartOptions, $chartData);

// Render the chart
$chart->renderChart();

```

# Customizing Chart Options and Data
You can customize the chart options and data by using the getChartOptions(), setChartOptions(), getChartData(), and setChartData() methods of the ChartinPHP class. Here's an example:

```php
// Get the current chart options
$currentOptions = $chart->getChartOptions();

// Update the chart options
$currentOptions['chart']['type'] = 'bar';
$currentOptions['chart']['height'] = 400;

// Set the updated chart options
$chart->setChartOptions($currentOptions);

// Get the current chart data
$currentData = $chart->getChartData();

// Update the chart data
$newData = array(
    array('month' => 'June', 'value' => 60),
    array('month' => 'July', 'value' => 70),
    array('month' => 'August', 'value' => 80),
    array('month' => 'September', 'value' => 90),
    array('month' => 'October', 'value' => 100)
);
$chart->setChartData($newData);

// Render the updated chart
$chart->renderChart();
```

# Rendering Multiple Charts on the Same Page
You can render multiple charts on the same page by creating multiple instances of the ChartinPHP class with unique IDs. Here's an example:

```php
// Chart 1 options and data
$chart1Options = array(
    // chart options for chart 1
);

$chart1Data = array(
    // chart data for chart 1
);

// Instantiate chart 1
$chart1 = new ChartinPHP($chart1Options, $chart1Data);

// Render chart 1
$chart1->renderChart('chart1'); // specify unique ID 'chart1'

// Chart 2 options and data
$chart2Options = array(
    // chart options for chart 2
);

$chart2Data = array(
    // chart data for chart 2
);

// Instantiate chart 2
$chart2 = new ChartinPHP($chart2Options, $chart2Data);

// Render chart 2
$chart2->renderChart('chart2'); // specify unique ID 'chart2'

```

Make sure to specify unique IDs for each chart when calling the renderChart() method, so that they can be rendered separately on the same page.

# Override Chart Type in Chart Options
If you want to override the type of the chart specified in the initial chart options, you can use the setChartType() method of the ChartinPHP class. Here's an example:

```php
// Set initial chart type as 'line'
$chartOptions = array(
    'chart' => array(
        'type' => 'line'
    ),
    // other chart options
);

// Instantiate the ChartinPHP class with initial chart options
$chart = new ChartinPHP($chartOptions, $chartData);

// Override chart type to 'bar'
$chart->setChartType('bar');

// Render the chart with overridden chart type
$chart->renderChart();

```

This will render the chart as a bar chart instead of a line chart, as specified in the overridden chart type.

###### Conclusion
ChartinPHP provides a convenient way to generate interactive charts in PHP applications. You can customize the chart options, data, and even override the chart type to suit your specific needs. With support for multiple charts on the same page, ChartinPHP allows you to create dynamic and engaging visualizations for your web applications.

For more information, please refer to the **ApexCharts** documentation and the **ChartinPHP** GitHub repository.
