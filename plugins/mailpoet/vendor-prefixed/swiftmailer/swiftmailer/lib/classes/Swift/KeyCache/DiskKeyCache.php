<?php
namespace MailPoetVendor;
if (!defined('ABSPATH')) exit;
class Swift_KeyCache_DiskKeyCache implements Swift_KeyCache
{
 const POSITION_START = 0;
 const POSITION_END = 1;
 const POSITION_CURRENT = 2;
 private $stream;
 private $path;
 private $keys = [];
 public function __construct(Swift_KeyCache_KeyCacheInputStream $stream, $path)
 {
 $this->stream = $stream;
 $this->path = $path;
 }
 public function setString($nsKey, $itemKey, $string, $mode)
 {
 $this->prepareCache($nsKey);
 switch ($mode) {
 case self::MODE_WRITE:
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
 break;
 case self::MODE_APPEND:
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_END);
 break;
 default:
 throw new Swift_SwiftException('Invalid mode [' . $mode . '] used to set nsKey=' . $nsKey . ', itemKey=' . $itemKey);
 break;
 }
 \fwrite($fp, $string);
 $this->freeHandle($nsKey, $itemKey);
 }
 public function importFromByteStream($nsKey, $itemKey, Swift_OutputByteStream $os, $mode)
 {
 $this->prepareCache($nsKey);
 switch ($mode) {
 case self::MODE_WRITE:
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
 break;
 case self::MODE_APPEND:
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_END);
 break;
 default:
 throw new Swift_SwiftException('Invalid mode [' . $mode . '] used to set nsKey=' . $nsKey . ', itemKey=' . $itemKey);
 break;
 }
 while (\false !== ($bytes = $os->read(8192))) {
 \fwrite($fp, $bytes);
 }
 $this->freeHandle($nsKey, $itemKey);
 }
 public function getInputByteStream($nsKey, $itemKey, Swift_InputByteStream $writeThrough = null)
 {
 $is = clone $this->stream;
 $is->setKeyCache($this);
 $is->setNsKey($nsKey);
 $is->setItemKey($itemKey);
 if (isset($writeThrough)) {
 $is->setWriteThroughStream($writeThrough);
 }
 return $is;
 }
 public function getString($nsKey, $itemKey)
 {
 $this->prepareCache($nsKey);
 if ($this->hasKey($nsKey, $itemKey)) {
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
 $str = '';
 while (!\feof($fp) && \false !== ($bytes = \fread($fp, 8192))) {
 $str .= $bytes;
 }
 $this->freeHandle($nsKey, $itemKey);
 return $str;
 }
 }
 public function exportToByteStream($nsKey, $itemKey, Swift_InputByteStream $is)
 {
 if ($this->hasKey($nsKey, $itemKey)) {
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_START);
 while (!\feof($fp) && \false !== ($bytes = \fread($fp, 8192))) {
 $is->write($bytes);
 }
 $this->freeHandle($nsKey, $itemKey);
 }
 }
 public function hasKey($nsKey, $itemKey)
 {
 return \is_file($this->path . '/' . $nsKey . '/' . $itemKey);
 }
 public function clearKey($nsKey, $itemKey)
 {
 if ($this->hasKey($nsKey, $itemKey)) {
 $this->freeHandle($nsKey, $itemKey);
 \unlink($this->path . '/' . $nsKey . '/' . $itemKey);
 }
 }
 public function clearAll($nsKey)
 {
 if (\array_key_exists($nsKey, $this->keys)) {
 foreach ($this->keys[$nsKey] as $itemKey => $null) {
 $this->clearKey($nsKey, $itemKey);
 }
 if (\is_dir($this->path . '/' . $nsKey)) {
 \rmdir($this->path . '/' . $nsKey);
 }
 unset($this->keys[$nsKey]);
 }
 }
 private function prepareCache($nsKey)
 {
 $cacheDir = $this->path . '/' . $nsKey;
 if (!\is_dir($cacheDir)) {
 if (!\mkdir($cacheDir)) {
 throw new Swift_IoException('Failed to create cache directory ' . $cacheDir);
 }
 $this->keys[$nsKey] = [];
 }
 }
 private function getHandle($nsKey, $itemKey, $position)
 {
 if (!isset($this->keys[$nsKey][$itemKey])) {
 $openMode = $this->hasKey($nsKey, $itemKey) ? 'r+b' : 'w+b';
 $fp = \fopen($this->path . '/' . $nsKey . '/' . $itemKey, $openMode);
 $this->keys[$nsKey][$itemKey] = $fp;
 }
 if (self::POSITION_START == $position) {
 \fseek($this->keys[$nsKey][$itemKey], 0, \SEEK_SET);
 } elseif (self::POSITION_END == $position) {
 \fseek($this->keys[$nsKey][$itemKey], 0, \SEEK_END);
 }
 return $this->keys[$nsKey][$itemKey];
 }
 private function freeHandle($nsKey, $itemKey)
 {
 $fp = $this->getHandle($nsKey, $itemKey, self::POSITION_CURRENT);
 \fclose($fp);
 $this->keys[$nsKey][$itemKey] = null;
 }
 public function __destruct()
 {
 foreach ($this->keys as $nsKey => $null) {
 $this->clearAll($nsKey);
 }
 }
 public function __wakeup()
 {
 $this->keys = [];
 }
}
