const fs = require('fs');
const path = require('path');

const projectRoot = path.resolve(__dirname, '..');
const buildDir = path.join(projectRoot, 'build');
const manifestPath = path.join(buildDir, 'mix-manifest.json');
const requiredAssets = {
    '/js/app.js': /^\/js\/app\.[a-f0-9]+\.js$/,
    '/css/app.css': /^\/css\/app\.[a-f0-9]+\.css$/,
};

const fail = (message) => {
    console.error(`Production manifest check failed: ${message}`);
    process.exit(1);
};

if (!fs.existsSync(manifestPath)) {
    fail('build/mix-manifest.json does not exist.');
}

let manifest;

try {
    manifest = JSON.parse(fs.readFileSync(manifestPath, 'utf8'));
} catch (error) {
    fail(`build/mix-manifest.json is not valid JSON. ${error.message}`);
}

for (const [logicalPath, hashedPattern] of Object.entries(requiredAssets)) {
    const assetPath = manifest[logicalPath];

    if (!assetPath) {
        fail(`Missing ${logicalPath}.`);
    }

    if (assetPath === logicalPath) {
        fail(`${logicalPath} points to itself. Run npm run prod before committing.`);
    }

    if (!hashedPattern.test(assetPath)) {
        fail(`${logicalPath} must point to a hashed production asset, received ${assetPath}.`);
    }

    const absoluteAssetPath = path.join(buildDir, assetPath.replace(/^\//, ''));

    if (!fs.existsSync(absoluteAssetPath)) {
        fail(`${assetPath} does not exist in build/.`);
    }
}

console.log('Production manifest points to hashed build assets.');
