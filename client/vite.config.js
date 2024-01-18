import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import autoprefixer from 'autoprefixer';
import fs from 'fs';

const host = 'silverstripe.lh';

export default defineConfig({
  server: {
    host,
    hmr: { host },
    https: {
      key: fs.readFileSync(
        `/Applications/MAMP/Library/OpenSSL/certs/${host}.key`,
      ),
      cert: fs.readFileSync(
        `/Applications/MAMP/Library/OpenSSL/certs/${host}.crt`,
      ),
    },
  },

  plugins: [
    laravel({
      input: ['src/app.scss', 'src/app.js'],
      refresh: true,
    }),
  ],

  css: {
    postcss: {
      plugins: [autoprefixer],
    },
  },
});
