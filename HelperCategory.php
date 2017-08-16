<?php
namespace plance\helper;

class HelperCategory
{
	/**
	 * The recursion create depth for tree array
	 * @param array $tree_ar array of tree data (two-dimensional)
	 * @param int $parent_id the starting ID of an array i.e. id which will begin with the formation of a tree
	 * @param int $depth depth
	 * @param array $line_ar new array (one-dimensional)
	 * @return array
	 */
	public static function createTree($tree_ar, $parent_id = 0, $depth = 0, $line_ar = [])
	{
		if(isset($tree_ar[$parent_id]))
		{
			foreach($tree_ar[$parent_id] as $id)
			{
				$line_ar[$id] = $depth;
				
				if(isset($tree_ar[$parent_id][$id]))
				{
					$line_ar = self::createTree($tree_ar, $id, $depth + 1, $line_ar);
				}
			}
		}
		
		return $line_ar;
	}
	
	/**
	 * Create line array from the tree array
	 * @param array $tree_ar array of tree data (two-dimensional)
	 * @param int $parent_id the starting ID of an array i.e. id which will begin with the formation of a tree
	 * @param array $line_ar new array (one-dimensional)
	 * @return array
	 */
	public static function createLine($tree_ar, $parent_id = 0, $line_ar = [])
	{
		if(isset($tree_ar[$parent_id]))
		{
			foreach($tree_ar[$parent_id] as $id)
			{
				$line_ar[] = $id;
				
				if(isset($tree_ar[$parent_id][$id]))
				{
					$line_ar = self::createLine($tree_ar, $id, $line_ar);
				}
			}
		}
		
		return $line_ar;
	}
}