<?php
	//	All JS files in build order.
	//	Much easier for debugging re: line numbers
?>
	<script src="js/phaser/build/phaser.min.js"></script>
<!--	<script src="js/phaser/src/pixi/Pixi.js"></script>
	<script src="js/phaser/src/Phaser.js"></script>
	<script src="js/phaser/src/utils/Utils.js"></script>

	<script src="js/phaser/src/pixi/core/Matrix.js"></script>
	<script src="js/phaser/src/pixi/core/Point.js"></script>
	<script src="js/phaser/src/pixi/core/Rectangle.js"></script>
	<script src="js/phaser/src/pixi/display/DisplayObject.js"></script>
	<script src="js/phaser/src/pixi/display/DisplayObjectContainer.js"></script>
	<script src="js/phaser/src/pixi/display/Sprite.js"></script>
	
	<script src="js/phaser/src/pixi/display/Stage.js"></script>
	<script src="js/phaser/src/pixi/extras/CustomRenderable.js"></script>
	<script src="js/phaser/src/pixi/extras/Strip.js"></script>
	<script src="js/phaser/src/pixi/extras/Rope.js"></script>
	
	<script src="js/phaser/src/pixi/extras/TilingSprite.js"></script>
	<script src="js/phaser/src/pixi/filters/FilterBlock.js"></script>
	<script src="js/phaser/src/pixi/filters/MaskFilter.js"></script>
	<script src="js/phaser/src/pixi/primitives/Graphics.js"></script>
	<script src="js/phaser/src/pixi/renderers/canvas/CanvasGraphics.js"></script>
	<script src="js/phaser/src/pixi/renderers/canvas/CanvasRenderer.js"></script>
	<script src="js/phaser/src/pixi/renderers/webgl/WebGLBatch.js"></script>
	<script src="js/phaser/src/pixi/renderers/webgl/WebGLGraphics.js"></script>
	<script src="js/phaser/src/pixi/renderers/webgl/WebGLRenderer.js"></script>
	<script src="js/phaser/src/pixi/renderers/webgl/WebGLRenderGroup.js"></script>
	<script src="js/phaser/src/pixi/renderers/webgl/WebGLShaders.js"></script>
	<script src="js/phaser/src/pixi/text/BitmapText.js"></script>
	<script src="js/phaser/src/pixi/text/Text.js"></script>
	<script src="js/phaser/src/pixi/textures/BaseTexture.js"></script>
	<script src="js/phaser/src/pixi/textures/Texture.js"></script>
	<script src="js/phaser/src/pixi/textures/RenderTexture.js"></script>
	<script src="js/phaser/src/pixi/utils/EventTarget.js"></script>
	<script src="js/phaser/src/pixi/utils/Polyk.js"></script>

	<script src="js/phaser/src/core/Camera.js"></script>
	<script src="js/phaser/src/core/State.js"></script>
	<script src="js/phaser/src/core/StateManager.js"></script>
	<script src="js/phaser/src/core/LinkedList.js"></script>
	<script src="js/phaser/src/core/Signal.js"></script>
	<script src="js/phaser/src/core/SignalBinding.js"></script>
	<script src="js/phaser/src/core/Plugin.js"></script>
	<script src="js/phaser/src/core/PluginManager.js"></script>
	<script src="js/phaser/src/core/Stage.js"></script>
	<script src="js/phaser/src/core/Group.js"></script>
	<script src="js/phaser/src/core/World.js"></script>
	<script src="js/phaser/src/core/Game.js"></script>

	<script src="js/phaser/src/input/Input.js"></script>
	<script src="js/phaser/src/input/Keyboard.js"></script>
	<script src="js/phaser/src/input/Mouse.js"></script>
	<script src="js/phaser/src/input/MSPointer.js"></script>
	<script src="js/phaser/src/input/Pointer.js"></script>
	<script src="js/phaser/src/input/Touch.js"></script>
	<script src="js/phaser/src/input/InputHandler.js"></script>

	<script src="js/phaser/src/gameobjects/Events.js"></script>
	<script src="js/phaser/src/gameobjects/GameObjectFactory.js"></script>
	<script src="js/phaser/src/gameobjects/Sprite.js"></script>
	<script src="js/phaser/src/gameobjects/TileSprite.js"></script>
	<script src="js/phaser/src/gameobjects/Text.js"></script>
	<script src="js/phaser/src/gameobjects/BitmapText.js"></script>
	<script src="js/phaser/src/gameobjects/Button.js"></script>
	<script src="js/phaser/src/gameobjects/Graphics.js"></script>
	<script src="js/phaser/src/gameobjects/RenderTexture.js"></script>

	<script src="js/phaser/src/system/Canvas.js"></script>
	<script src="js/phaser/src/system/StageScaleMode.js"></script>
	<script src="js/phaser/src/system/Device.js"></script>
	<script src="js/phaser/src/system/RequestAnimationFrame.js"></script>

	<script src="js/phaser/src/math/RandomDataGenerator.js"></script>
	<script src="js/phaser/src/math/Math.js"></script>
	<script src="js/phaser/src/math/QuadTree.js"></script>

	<script src="js/phaser/src/geom/Circle.js"></script>
	<script src="js/phaser/src/geom/Point.js"></script>
	<script src="js/phaser/src/geom/Rectangle.js"></script>

	<script src="js/phaser/src/net/Net.js"></script>

	<script src="js/phaser/src/tween/TweenManager.js"></script>
	<script src="js/phaser/src/tween/Tween.js"></script>
	<script src="js/phaser/src/tween/Easing.js"></script>

	<script src="js/phaser/src/time/Time.js"></script>

	<script src="js/phaser/src/animation/AnimationManager.js"></script>
	<script src="js/phaser/src/animation/Animation.js"></script>
	<script src="js/phaser/src/animation/Frame.js"></script>
	<script src="js/phaser/src/animation/FrameData.js"></script>
	<script src="js/phaser/src/animation/Parser.js"></script>

	<script src="js/phaser/src/loader/Cache.js"></script>
	<script src="js/phaser/src/loader/Loader.js"></script>
	<script src="js/phaser/src/loader/Parser.js"></script>

	<script src="js/phaser/src/sound/Sound.js"></script>
	<script src="js/phaser/src/sound/SoundManager.js"></script>

	<script src="js/phaser/src/utils/Debug.js"></script>
	<script src="js/phaser/src/utils/Color.js"></script>

	<script src="js/phaser/src/physics/arcade/ArcadePhysics.js"></script>
	<script src="js/phaser/src/physics/arcade/Body.js"></script>

	<script src="js/phaser/src/particles/Particles.js"></script>
	<script src="js/phaser/src/particles/arcade/ArcadeParticles.js"></script>
	<script src="js/phaser/src/particles/arcade/Emitter.js"></script>

	<script src="js/phaser/src/tilemap/Tilemap.js"></script>
	<script src="js/phaser/src/tilemap/TilemapLayer.js"></script>
	<script src="js/phaser/src/tilemap/Tile.js"></script>
	<script src="js/phaser/src/tilemap/TilemapRenderer.js"></script>
	
-->