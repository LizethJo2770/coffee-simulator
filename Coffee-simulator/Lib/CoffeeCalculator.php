<?php
class CoffeeCalculator {
    private $parameters;

    public function __construct($parameters) {
        $this->parameters = $parameters;
    }

    public function calculateYield() {
        $temperatureEffect = $this->calculateTemperatureEffect();
        $rainfallEffect = $this->calculateRainfallEffect();
        $soilEffect = $this->calculateSoilEffect();
        $managementEffect = $this->calculateManagementEffect();

        return 1200 * $temperatureEffect * $rainfallEffect * $soilEffect * $managementEffect;
    }

    private function calculateTemperatureEffect() {
        $temp = $this->parameters['temperature'];
        if ($temp >= 19 && $temp <= 21.5) {
            return 1.0;
        }
        $deviation = min(abs($temp - 19), abs($temp - 21.5));
        return max(0.5, 1 - ($deviation * 0.05));
    }

    private function calculateRainfallEffect() {
        $rain = $this->parameters['rainfall'];
        if ($rain >= 1800 && $rain <= 2300) {
            return 1.0;
        }
        $deviation = min(abs($rain - 1800), abs($rain - 2300));
        return max(0.4, 1 - (($deviation / 100) * 0.1));
    }

    private function calculateSoilEffect() {
        $organicMatter = $this->parameters['organicMatter'];
        if ($organicMatter >= 8 && $organicMatter <= 12) {
            return 1.0;
        }
        $deviation = min(abs($organicMatter - 8), abs($organicMatter - 12));
        return max(0.6, 1 - ($deviation * 0.08));
    }

    private function calculateManagementEffect() {
        $densityEffect = $this->calculateDensityEffect();
        $waterEffect = $this->calculateWaterManagementEffect();
        return $densityEffect * $waterEffect;
    }

    private function calculateDensityEffect() {
        $density = $this->parameters['plantDensity'];
        $optimalDensity = 5000;
        $deviation = abs($density - $optimalDensity);
        return max(0.7, 1 - (($deviation / 500) * 0.05));
    }

    private function calculateWaterManagementEffect() {
        $waterUsage = $this->parameters['waterUsage'];
        $optimalUsage = 40;
        $deviation = abs($waterUsage - $optimalUsage);
        return max(0.8, 1 - (($deviation / 5) * 0.04));
    }
}
?>
