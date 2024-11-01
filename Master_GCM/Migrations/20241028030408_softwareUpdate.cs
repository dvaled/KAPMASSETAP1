using System;
using Microsoft.EntityFrameworkCore.Migrations;

#nullable disable

namespace Master_GCM.Migrations
{
    /// <inheritdoc />
    public partial class softwareUpdate : Migration
    {
        /// <inheritdoc />
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.AlterColumn<DateTime>(
                name: "DATEUPDATED",
                table: "TRN_DTL_SOFTWARE",
                type: "timestamp with time zone",
                nullable: true,
                oldClrType: typeof(DateOnly),
                oldType: "date",
                oldNullable: true);

            migrationBuilder.AlterColumn<DateTime>(
                name: "DATEADDED",
                table: "TRN_DTL_SOFTWARE",
                type: "timestamp with time zone",
                nullable: false,
                oldClrType: typeof(DateOnly),
                oldType: "date");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET",
                column: "ASSETCODE");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                column: "ASSETCODE");
        }

        /// <inheritdoc />
        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG");

            migrationBuilder.DropIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET");

            migrationBuilder.DropIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE");

            migrationBuilder.AlterColumn<DateOnly>(
                name: "DATEUPDATED",
                table: "TRN_DTL_SOFTWARE",
                type: "date",
                nullable: true,
                oldClrType: typeof(DateTime),
                oldType: "timestamp with time zone",
                oldNullable: true);

            migrationBuilder.AlterColumn<DateOnly>(
                name: "DATEADDED",
                table: "TRN_DTL_SOFTWARE",
                type: "date",
                nullable: false,
                oldClrType: typeof(DateTime),
                oldType: "timestamp with time zone");

            migrationBuilder.CreateIndex(
                name: "IX_TRN_LOG_ASSETCODE",
                table: "TRN_LOG",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_HIST_ASSET_ASSETCODE",
                table: "TRN_HIST_ASSET",
                column: "ASSETCODE",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_TRN_DTL_SOFTWARE_ASSETCODE",
                table: "TRN_DTL_SOFTWARE",
                column: "ASSETCODE",
                unique: true);
        }
    }
}
