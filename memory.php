<?php
/**
 * File: memory.php
 * Created: 29.10.2022
 * Version: 1.0
 * Author: Espoleon
 * Description: Memory class
 *              Contains following PSR1 Standards -> Basic Coding Standard
 *              - Files MUST use only <?php and <?= tags
 *              - Method names MUST be declared in camelCase()
 *              Contains following PSR2 Standards -> Coding Style Guide
 *              - Code MUST use 4 spaces for indenting, not tabs
 *              - Opening braces for classes MUST go on the next line,
 *                and closing braces MUST go on the next line after the body
 *              - Opening braces for methods MUST go on the next line,
 *                and closing braces MUST go on the next line after the body
 *              - Visibility MUST be declared on all properties and methods
 *              - Opening braces for control structures MUST go on the same line,
 *                and closing braces MUST go on the next line after the body
 *              Contains following Clean Code Standards
 *              - Dont repeat yourself (DRY)
 *              - Keep it simple, stupid (KISS)
 */

class Memory
{
    public int $rounded = 2;
    
    public string $unit = 'MB';
    
    private function divided()
    {
        return $this->unit === 'KB' ? 1024 : 1024*1024;
    }
    
    private function unit()
    {
        return $this->unit === 'KB' ? ' KB' : ' MB';
    }
    
    public function usage()
    {
        return round(memory_get_usage() / $this->divided(), $this->rounded);
    }
    
    public function usageWithUnit()
    {
        return $this->usage() . $this->unit();
    }
    
    public function peak()
    {
        return round(memory_get_peak_usage() / $this->divided(), $this->rounded);
    }
    
    public function peakWithUnit()
    {
        return $this->peak() . $this->unit();
    }
    
    public function allocate()
    {
        return round(memory_get_usage(true) / $this->divided(), $this->rounded);
    }
    
    public function allocateWithUnit()
    {
        return $this->allocate() . $this->unit();
    }
    
    public function limit()
    {
        $limit = substr(ini_get('memory_limit'), 0, -1);
        return $this->unit === 'KB' ? $limit * 1024 : $limit;
    }
    
    public function limitWithUnit()
    {
        return $this->limit() . $this->unit();
    }
    
    public function inUse()
    {
        return round($this->usage() * 100 / $this->limit(), $this->rounded);
    }
    
    public function inUseWithUnit()
    {
        return $this->inUse() . ' %';
    }
}