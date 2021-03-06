const { fromConfigRoot } = require( '@wordpress/scripts/utils' );
// Get the base config provided by @wordpress/scripts.
const baseConfig = require( fromConfigRoot( 'jest-e2e.config.js' ) );
const path = require( 'path' );

module.exports = {
	...baseConfig,
	testMatch: [ '**/specs/**/*.test.[jt]s?(x)' ],
	setupFilesAfterEnv: [
		...baseConfig.setupFilesAfterEnv,
		path.join( __dirname, 'tests/activate-plugin.js' ),
	],
};
